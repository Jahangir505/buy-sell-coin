<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Voucher;
use App\Models\Wallet;
use App\Models\Currency;
use \Stripe\Stripe;
use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\PurchaseRequest;
use App\Models\Sale;



class StripeController extends Controller
{
     public function buyvoucher(Request $request){
    	$user = Auth::user();
        $user->currency_id = 1;
        $user->save();
        return view('stripe.buyvoucher');
    }

    public function sendRequestToStripe(Request $request){
    	  $this->validate($request,[
            'amount'  =>  'required|integer|min:1',
            'stripeToken'	=>	'required'
        ]);

    	$fee = (( $request->amount * 2.99 ) / 100 ) + 0.5 ;
    	$amount_without_fees = $request->amount - $fee ;

    	Stripe::setApiKey($_ENV['STRIPE_SECRET_KEY']);

    	// Stipe fee 2.99% + R$0.50;


    	try{
	    	\Stripe\Charge::create([
	    		'amount'	=>	$request->amount * 100,
	    		'currency'	=>	'usd',
	    		'source'	=>	$request->stripeToken,
	    		'description'	=>	'Credits',

	    	]);

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

    		flash('Payment Success');
    		return redirect('/home');

    	}catch(\Exception $e){
    		dd($e);
    	}
    }
    
    public function storefrontIndex(Request $request, $ref){
        if(Auth::check())
            Auth::logout();

        $PurchaseRequest = PurchaseRequest::with('Transaction')->with('Currency')->where('ref', $ref)->first();
        if($PurchaseRequest == null)
        return abort(404); 
        
        if ($PurchaseRequest->Currency->id != 1) {
    		dd('Card Payments only supports USD. Please Return back and use Your Wallet');
    	}
    	
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
    
        return view('merchant.stripestorefront')
        ->with('ref', $ref)
        ->with('merchant', $merchant);
    }
    
    public function storefrontIndexPayment(Request $request, $ref){
        if(Auth::check())
            Auth::logout();

        $PurchaseRequest = PurchaseRequest::with('Transaction')->with('Currency')->where('ref', $ref)->first();
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
            'stripeToken'	=>	'required'
        ]);
        //dd($total);

        if($total <= 0){
            return redirect()->back()->with('message', 'Amount should be greater than 0.');
        }
        
        $fee = (( $total * 2.99 ) / 100 ) + 0.5 ;
    	$amount_without_fees = $total - $fee ;

    	Stripe::setApiKey($_ENV['STRIPE_SECRET_KEY']);
    	
    	try{
	    	\Stripe\Charge::create([
	    		'amount'	=>	$total * 100,
	    		'currency'	=>	'usd',
	    		'source'	=>	$request->stripeToken,
	    		'description'	=>	'Merchant Payment',
	    	]);

                $currency = Currency::where('code', $PurchaseRequest->currency_code)->first();
            
                $merchant = Merchant::with('User')->where('merchant_key',session()->get('PurchaseRequest')->merchant_key)->first();

           		$wallet = Wallet::where('user_id', $merchant->User->id)->where('currency_id', $currency->id)->first();

           		$sale_fee = ((setting('merchant.merchant_percentage_fee')/100)* (float)session()->get('PurchaseRequestTotal')) + 259 ; 
           		
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
		            'thumb' =>  url('/').'/storage/imgs/N7EVK0hQpVT3p0PrB95QIufkOOOmKXQ2WqiO2sPi.png',
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
       

    	}catch(\Exception $e){
    		return redirect()->back()->with('message', $e->getMessage());
    	}
        
    }
}
