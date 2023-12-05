<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Merchant;
use App\Models\Currency;
use App\Models\Voucher;
use App\Models\Wallet;
use App\Models\PurchaseRequest;
use Illuminate\Http\Request;
use App\Models\Sale;


class PayzoftWalletController extends Controller
{
     public function buyvoucher(Request $request){
    	$user = Auth::user();
        $user->currency_id = Auth::user()->currentCurrency()->id;
        $user->save();
        return view('payzoftwallet.buyvoucher');
    }

    public function payment(Request $request){
    	$this->validate($request,[
            'amount'  =>  'required|integer|min:1',
        ]);
        
        if($request->amount <= 0){
            return redirect()->back()->with('message', 'Amount should be greater than 0.');
        }
        $user = Auth::user();
        $wallet = Auth::user()->currentWallet() ;
        
        $finalize_amt = number_format((float)$request->amount, 2, '.', '');
        $parameters = array(
            'amount' => number_format((float)$request->amount, 2, '.', ''),
            'currency' => $wallet->currency->code,
            'details' => 'Wallet Funding',
            'custom' => substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 15),
            'ipn_url' => 'http://buycoins.codesviral.com/home',
            'success_url' => "http://buycoins.codesviral.com/buyvoucher/payzoftwallet/payment/success/$finalize_amt",
            //'success_url' => 'http://buycoins.codesviral.com/home',
            'cancel_url' => 'http://buycoins.codesviral.com/home',
            'public_key' => 'KEY-HERE',
            'name' => $user->name,
            'email' => $user->email
        );
        //dd($parameters);
        
        // Generate The Url  (LIVE)
        $endpoint = 'https://wallet.payzoft.com/express/initiate';
        $call = $endpoint . "?" . http_build_query($parameters);
        
        
        // Generate The Url (TEST)
        // $endpoint = 'https://wallet.payzoft.com/express/sandbox/initiate';
        // $call = $endpoint . "?" . http_build_query($parameters);
        
        // Send Request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $call);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        $response = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($response);
        //dd($parameters,$response);
        
        if($response->error=="ok"){  
            
            /*$fee = (( $request->amount * 4.00 ) / 100 ) + 0.0 ;
    	    $amount_without_fees = $request->amount - $fee ;
    	
            $wallet = Auth::user()->currentWallet() ;
		           		
       		$voucherValue = (float)$amount_without_fees;

       		$voucher = Voucher::create([
	            'user_id'   =>  Auth::user()->id,
	            'voucher_amount'    =>  $request->amount,
	            'voucher_fee'   =>  $fee,
	            'voucher_value' =>  $voucherValue,
	            'voucher_code'  =>  Auth::user()->id.str_random(4).time().str_random(4),
	            'currency_id'   =>  $wallet->currency->id,
	            'currency_symbol'   =>  $wallet->currency->symbol,
	            'wallet_id' =>  $wallet->id
	        ]);

	        $wallet->amount = $wallet->amount + $voucherValue ;

	    	$voucher->user_loader = Auth::user()->id;
	    	
	    	$voucher->is_loaded = 1 ;

	    	$voucher->save();

	    	$wallet->save();

	        Auth::user()->RecentActivity()->save($voucher->Transactions()->create([
	            'user_id' =>  Auth::user()->id,
	            'entity_id'   =>  $voucher->id,
	            'entity_name' =>  $wallet->currency->name,
	            'transaction_state_id'  =>  1, // waiting confirmation
	            'money_flow'    => '+',
	            'activity_title'    =>  'Voucher Load',
	            'thumb'	=>	$wallet->currency->thumb,
	            'currency_id' =>  $voucher->currency_id,
	            'currency_symbol' =>  $voucher->currency_symbol,
	            'gross' =>  $request->amount,
	            'fee'   =>  $fee,
	            'net'   =>  $voucherValue,
	            'balance'	=>	$wallet->amount,
	        ]));    
            
            $msg = 'Deposit successful';*/
            return redirect($response->url);
        }else{
            $msg = 'Deposit failed. Please try again later.';
        } 
        die('The API returned an error');
        return redirect()->back()->with('message', $msg);
    }
    
    
    public function buyvoucherIndexPaymentSuccess(Request $request, $ref){
        //dd($ref);
        $fee = (( $ref * 4.00 ) / 100 ) + 0.0 ;
    	    $amount_without_fees = $ref - $fee ;
    	
            $wallet = Auth::user()->currentWallet() ;
		           		
       		$voucherValue = (float)$amount_without_fees;

       		$voucher = Voucher::create([
	            'user_id'   =>  Auth::user()->id,
	            'voucher_amount'    =>  $ref,
	            'voucher_fee'   =>  $fee,
	            'voucher_value' =>  $voucherValue,
	            'voucher_code'  =>  Auth::user()->id.str_random(4).time().str_random(4),
	            'currency_id'   =>  $wallet->currency->id,
	            'currency_symbol'   =>  $wallet->currency->symbol,
	            'wallet_id' =>  $wallet->id
	        ]);

	        $wallet->amount = $wallet->amount + $voucherValue ;

	    	$voucher->user_loader = Auth::user()->id;
	    	
	    	$voucher->is_loaded = 1 ;

	    	$voucher->save();

	    	$wallet->save();

	        Auth::user()->RecentActivity()->save($voucher->Transactions()->create([
	            'user_id' =>  Auth::user()->id,
	            'entity_id'   =>  $voucher->id,
	            'entity_name' =>  $wallet->currency->name,
	            'transaction_state_id'  =>  1, // waiting confirmation
	            'money_flow'    => '+',
	            'activity_title'    =>  'Voucher Load',
	            'thumb'	=>	$wallet->currency->thumb,
	            'currency_id' =>  $voucher->currency_id,
	            'currency_symbol' =>  $voucher->currency_symbol,
	            'gross' =>  $ref,
	            'fee'   =>  $fee,
	            'net'   =>  $voucherValue,
	            'balance'	=>	$wallet->amount,
	        ]));    
            return redirect('http://buycoins.codesviral.com/home');
    }
  
    
    public function storefrontIndex(Request $request, $ref){
        if(Auth::check())
            Auth::logout();

        $PurchaseRequest = PurchaseRequest::with('Transaction')->with('Currency')->where('ref', $ref)->first();

        if($PurchaseRequest == null)
        return abort(404); 
        
        /*if ($PurchaseRequest->Currency->id != 1) {
    		dd('Mobile Money only supports MWK. Please Return back and use Your Wallet or another tird part');
    	}*/
    	
        if($PurchaseRequest->attempts >= 5 ){
            if( $PurchaseRequest->is_expired == false ){
                $PurchaseRequest->is_expired = true ;
                $PurchaseRequest->save();
            }

            return abort(404); 
        }

        if ( ( $PurchaseRequest != null and $PurchaseRequest->is_expired == false ) or session()->has('PurchaseRequest')) {
            $total = 0;

            $merchant = Merchant::where('merchant_key', $PurchaseRequest->merchant_key)->first();
            
            if($merchant == null)
            return abort(404);
            
            foreach ($PurchaseRequest->data->items as $item) {
                $total += ( $item->price * $item->qty );
            }
            session()->put('PurchaseRequest', $PurchaseRequest);
            session()->put('PurchaseRequestTotal', $total);
        }
        
        return view('merchant.payzoftstorefront')
        ->with('ref', $ref)
        ->with('merchant', $merchant);
    }
    
    public function storefrontIndexPayment(Request $request, $ref){
        if(Auth::check())
            Auth::logout();

        $PurchaseRequest = PurchaseRequest::with('Transaction')->with('Currency')->where('ref', $ref)->first();
        //dd($PurchaseRequest);
        if($PurchaseRequest == null)
        return abort(404);
        
        if($PurchaseRequest->attempts >= 5 ){
            if( $PurchaseRequest->is_expired == false ){
                $PurchaseRequest->is_expired = true ;
                $PurchaseRequest->save();
            }

            return abort(404); 
        }
         $total = 0;
        if ( ( $PurchaseRequest != null and $PurchaseRequest->is_expired == false ) or session()->has('PurchaseRequest')) {
         
            $merchant = Merchant::where('merchant_key', $PurchaseRequest->merchant_key)->first();
            
            if($merchant == null)
            return abort(404);
            
            foreach ($PurchaseRequest->data->items as $item) {
                $total += ( $item->price * $item->qty );
            }
        }
        $this->validate($request,[
            'user_name'	=>	'required',
            'email' => 'required'
        ]);
        
        
        if($total <= 0){
            return redirect()->back()->with('message', 'Amount should be greater than 0.');
        }
        try{
            $parameters = array(
            'amount' => number_format((float)$total, 2, '.', ''),
            'currency' => $PurchaseRequest->currency_code,
            'details' => 'Merchant Payment',
            'custom' => substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 15),
            'ipn_url' => 'https://rechargevtu.codesviral.com/home',
            'success_url' => "https://rechargevtu.codesviral.com/merchant/storefront/payzoftwallet/payment/success/$ref",
            'cancel_url' => $PurchaseRequest->data->cancel_url,
            'public_key' => 'PQ5BW25SCOTCBFQUP4G3',
            'name' => $request->user_name,
            'email' => $request->email
        );
        //dd($parameters);
        
        // Generate The Url  (LIVE)
        $endpoint = 'https://wallet.payzoft.com/express/initiate';
        $call = $endpoint . "?" . http_build_query($parameters);
        
        
        // Generate The Url (TEST)
        // $endpoint = 'https://wallet.payzoft.com/express/sandbox/initiate';
        // $call = $endpoint . "?" . http_build_query($parameters);
        
        // Send Request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $call);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        $response = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($response);
        //dd($response);
           if($response->error=="ok"){  
            
            /*$currency = Currency::where('code', $PurchaseRequest->currency_code)->first();

            $merchant = Merchant::with('User')->where('merchant_key',session()->get('PurchaseRequest')->merchant_key)->first();

       		$wallet = Wallet::where('user_id', $merchant->User->id)->where('currency_id', $currency->id)->first();

       		$sale_fee = ((setting('merchant.merchant_percentage_fee')/100)* (float)session()->get('PurchaseRequestTotal')) + setting('merchant.merchant_fixed_fee') ; 
       		
       		$wallet->amount = $wallet->amount + (float)$total - $sale_fee;

	    	$wallet->save();

       		$sale = Sale::create([
	          'user_id' =>  $merchant->User->id,
	          'merchant_id' =>  $merchant->id, 
	          'purchase_id' =>  0,
	          'transaction_state_id'  =>  1,
	          'gross' =>  (float)session()->get('PurchaseRequestTotal'),
	          'fee' =>  $sale_fee, 
	          'net' =>  (float)session()->get('PurchaseRequestTotal') - $sale_fee,
	          'currency_id' =>  $currency->id,
	          'currency_symbol' =>  $currency->symbol,
	          'json_data' =>  json_encode($PurchaseRequest->data)
	        ]);

	        $merchant->User->RecentActivity()->save($sale->Transactions()->create([
	            'user_id' => $sale->user_id,
	            'entity_id'   =>  $merchant->id,
	            'entity_name' =>  $merchant->name,
	            'transaction_state_id'  =>  1, // waiting confirmation
	            'money_flow'    => '+',
	            'currency_id' =>  $currency->id,
	            'currency_symbol' =>  $currency->symbol,
	            'thumb' =>  url('/').'/storage/imgs/payzoft.png',
	            'activity_title'    =>  'Sale',
	            'gross' =>  $sale->gross,
	            'fee'   =>  $sale->fee,
	            'net'   =>  $sale->net,
	            'balance'	=>	$wallet->amount,
	            'request_id'  =>  $PurchaseRequest->id,
	            'json_data' =>  json_encode($PurchaseRequest->data),
	        ]));

        
            session()->forget('cart');
       	    $PurchaseRequest->is_expired = true ;
		    $PurchaseRequest->save();*/
		    
		    return redirect($response->url);
            // return redirect( http_build_url($PurchaseRequest->data->return_url, array("query" => "token=$PurchaseRequest->ref"), HTTP_URL_JOIN_QUERY));
        
		    
            $msg = 'Payment successful';
        }else{
            $msg = 'Payment failed. Please try again later.';
        }   
        }catch(\Exception $e){
            return redirect()->back()->with('message', $e->getMessage());
        }
        return redirect()->back()->with('message', $msg);
        
    }
    
    public function storefrontIndexPaymentSuccess(Request $request, $ref){
        $PurchaseRequest = PurchaseRequest::with('Transaction')->with('Currency')->where('ref', $ref)->first();
        $total = 0;
        if ( ( $PurchaseRequest != null and $PurchaseRequest->is_expired == false ) or session()->has('PurchaseRequest')) {
         
            $merchant = Merchant::where('merchant_key', $PurchaseRequest->merchant_key)->first();
            
            if($merchant == null)
            return abort(404);
            
            foreach ($PurchaseRequest->data->items as $item) {
                $total += ( $item->price * $item->qty );
            }
        }
        
        
        
        $currency = Currency::where('code', $PurchaseRequest->currency_code)->first();

            $merchant = Merchant::with('User')->where('merchant_key',session()->get('PurchaseRequest')->merchant_key)->first();

       		$wallet = Wallet::where('user_id', $merchant->User->id)->where('currency_id', $currency->id)->first();

       		$sale_fee = ((setting('merchant.merchant_percentage_fee')/100)* (float)session()->get('PurchaseRequestTotal')) + setting('merchant.merchant_fixed_fee') ; 
       		
       		$wallet->amount = $wallet->amount + (float)$total - $sale_fee;

	    	$wallet->save();

       		$sale = Sale::create([
	          'user_id' =>  $merchant->User->id,
	          'merchant_id' =>  $merchant->id, 
	          'purchase_id' =>  0,
	          'transaction_state_id'  =>  1,
	          'gross' =>  (float)session()->get('PurchaseRequestTotal'),
	          'fee' =>  $sale_fee, 
	          'net' =>  (float)session()->get('PurchaseRequestTotal') - $sale_fee,
	          'currency_id' =>  $currency->id,
	          'currency_symbol' =>  $currency->symbol,
	          'json_data' =>  json_encode($PurchaseRequest->data)
	        ]);

	        $merchant->User->RecentActivity()->save($sale->Transactions()->create([
	            'user_id' => $sale->user_id,
	            'entity_id'   =>  $merchant->id,
	            'entity_name' =>  $merchant->name,
	            'transaction_state_id'  =>  1, // waiting confirmation
	            'money_flow'    => '+',
	            'currency_id' =>  $currency->id,
	            'currency_symbol' =>  $currency->symbol,
	            'thumb' =>  url('/').'/storage/imgs/payzoft.png',
	            'activity_title'    =>  'Sale',
	            'gross' =>  $sale->gross,
	            'fee'   =>  $sale->fee,
	            'net'   =>  $sale->net,
	            'balance'	=>	$wallet->amount,
	            'request_id'  =>  $PurchaseRequest->id,
	            'json_data' =>  json_encode($PurchaseRequest->data),
	        ]));

        
            session()->forget('cart');
       	    $PurchaseRequest->is_expired = true ;
		    $PurchaseRequest->save();
		    
		    return redirect( http_build_url($PurchaseRequest->data->return_url, array("query" => "token=$PurchaseRequest->ref"), HTTP_URL_JOIN_QUERY));
    }
    
}
