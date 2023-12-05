<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Sale;
use App\Models\Voucher;
use App\Models\Wallet;
use App\Models\Merchant;
use App\Models\Currency;
use App\Models\PurchaseRequest;

class RaveController extends Controller{
    
    private $SECRET_KEY; 

	public function __construct()
	{
		$this->SECRET_KEY = "FLWSECK-79af5fd63bf8fe349e52f948cc9549-X";
		$this->SECRET_KEY_TEST = "FLWSECK_TEST-27533ff8b419298459e615a7cf7228-X";
		$this->ENC_KEY_TEST = "FLWSECK_TESTafbf35b90c63";
	}
    
    
    public function buyvoucher(Request $request){

		$user = Auth::user();
        $user->currency_id = Auth::user()->currentCurrency()->id;
        $user->save();
        return view('rave.buyvoucher');
    }
    
    private function encrypt3Des($data, $key){

      $encData = openssl_encrypt($data, 'DES-EDE3', $key, OPENSSL_RAW_DATA);
      
        return base64_encode($encData); 
    
    }
    
    public function payVoucherRaveGlobalCard(Request $request){
        $reference = Auth::user()->id.str_random(4).time().str_random(4);
        $amount = isset($_POST['amount']) ? $_POST['amount'] : '';
        $currency = "US";
        $card_number = isset($_POST['card_number']) ? $_POST['card_number'] : '';
        $cvv = isset($_POST['cvv']) ? $_POST['cvv'] : '';  
        $expiry_month = isset($_POST['expiry_month']) ? $_POST['expiry_month'] : '';
        $expiry_year = isset($_POST['expiry_year']) ? $_POST['expiry_year'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        
        $data = array(
            "tx_ref" => $reference,
            "amount" => $amount,
            "currency" => $currency,
            "card_number" => $card_number,
            "cvv" => $cvv,
            "expiry_month" => $expiry_month,
            "expiry_year" => $expiry_year,
            "email" => $email
            );
        $data_string = json_encode($data);
        $cipher_text = $this->encrypt3Des($data_string, $this->ENC_KEY_TEST);
        $payload = json_encode(
            array(
                "client" => $cipher_text,
            )
        );
        
        $headr = array();
        $headr[] = 'Content-type: application/json';
        $headr[] = 'Authorization: Bearer '.$this->SECRET_KEY_TEST;
        
        $ch = curl_init('https://api.flutterwave.com/v3/charges?type=card');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        curl_close($ch);
        
        $resp = json_decode($response, true);
        dd($resp);
        
    }
    
    public function payVoucherRaveSuccess(Request $request){
        $reference = isset($_POST['reference']) ? $_POST['reference'] : '';
        $amount = isset($_POST['amount']) ? $_POST['amount'] : '';
        $currency = isset($_POST['currency']) ? $_POST['currency'] : '';
		if(!$reference){
		  die('No reference supplied');
		}
		
		if(!$amount){
		  die('No amount supplied');
		}
		
		if(!$reference){
		  die('No amount supplied');
		}
		
		$query = array(
            "SECKEY" => $this->SECRET_KEY,
            "txref" => $reference
        );
        $data_string = json_encode($query);
        $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');                                                    
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                              
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		
		$response = curl_exec($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        curl_close($ch);
        
        $resp = json_decode($response, true);
        
        $paymentStatus = $resp['status'];
        $chargeResponsecode = $resp['data']['chargecode'];
        $chargeAmount = $resp['data']['amount'];
        $chargeCurrency = $resp['data']['currency'];
        
        
        if ( ($paymentStatus === "success")
        &&($chargeResponsecode == "00" || $chargeResponsecode == "0") 
        && ($chargeAmount == $amount)  
        && ($chargeCurrency == $currency)){
          //Give Value and return to Success page
            $wallet = Auth::user()->currentWallet() ;
	   		$fee = (float)($resp['data']['appfee']) ;
	   		$voucherValue = (float)( $chargeAmount - $fee);
	   		$voucher = Voucher::create([
	            'user_id'   =>  Auth::user()->id,
	            'voucher_amount'    =>  $chargeAmount,
	            'voucher_fee'   =>  $fee,
	            'voucher_value' =>  $voucherValue,
	            'voucher_code'  =>  Auth::user()->id.str_random(4).time().str_random(4),
	            'currency_id'   =>  $wallet->currency->id,
	            'currency_symbol'   =>  $wallet->currency->symbol,
	            'wallet_id' =>  $wallet->id]);
	            
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
	            'currency_id' =>  $voucher->currency_id,
	            'currency_symbol' =>  $voucher->currency_symbol,
	            'gross' =>  $chargeAmount,
	            'fee'   =>  $fee,
	            'thumb'	=>	$wallet->currency->thumb,
	            'net'   =>  $voucherValue,
	            'balance'	=>	$wallet->amount,
	        ]));
	        
            return redirect('/home');
        } else {
            //Dont Give Value and return to Failure page
            die('The API returned an error');
        }

    }
    
    public function postStoreFrontSuccess(Request $request){
        $reference = isset($_POST['reference']) ? $_POST['reference'] : '';
        $amount = isset($_POST['amount']) ? $_POST['amount'] : '';
        $currency = isset($_POST['currency']) ? $_POST['currency'] : '';
		if(!$reference){
		  die('No reference supplied');
		}
		
		if(!$amount){
		  die('No amount supplied');
		}
		
		if(!$reference){
		  die('No amount supplied');
		}
		
		$PurchaseRequest = PurchaseRequest::with('Transaction')->with('Currency')->where('ref', $reference)->first();
		
		if( $PurchaseRequest->is_expired == true ){
	    	return abort(404); 
		    
		}
		
		$query = array(
            "SECKEY" => $this->SECRET_KEY,
            "txref" => $reference
        );
        $data_string = json_encode($query);
        $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');                                                    
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                              
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		
		$response = curl_exec($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        curl_close($ch);
        
        $resp = json_decode($response, true);
        
        $paymentStatus = $resp['status'];
        $chargeResponsecode = $resp['data']['chargecode'];
        $chargeAmount = $resp['data']['amount'];
        $chargeCurrency = $resp['data']['currency'];
        $fee = (float)($resp['data']['appfee']) ;
        $net = $chargeAmount - $fee;
        $gross = $chargeAmount;
        
        if ( ($paymentStatus === "success")
        &&($chargeResponsecode == "00" || $chargeResponsecode == "0") 
        && ($chargeAmount == $amount)  
        && ($chargeCurrency == $currency)){
            
            $currency = Currency::where('code', $PurchaseRequest->currency_code)->first();
            
            $merchant = Merchant::with('User')->where('merchant_key',session()->get('PurchaseRequest')->merchant_key)->first();

       		$wallet = Wallet::where('user_id', $merchant->User->id)->where('currency_id', $currency->id)->first();

       		$sale_fee = ((setting('merchant.merchant_percentage_fee')/100)* (float)session()->get('PurchaseRequestTotal')) + setting('merchant.merchant_fixed_fee') ; 
       		
       		$wallet->amount = $wallet->amount + $net ;

	    	$wallet->save();
	    	
	    	$sale = Sale::create([
	          'user_id' =>  $merchant->User->id,
	          'merchant_id' =>  $merchant->id, 
	          'purchase_id' =>  0,
	          'transaction_state_id'  =>  1,
	          'gross' =>  $gross,
	          'fee' =>  $fee, 
	          'net' =>  $net,
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
	            'thumb' =>  url('/').'/storage/imgs/photo5917810845184799926.jpg',
	            'activity_title'    =>  'Sale',
	            'gross' =>  $sale->gross,
	            'fee'   =>  $sale->fee,
	            'net'   =>  $sale->net,
	            'balance'	=>	$wallet->amount,

	            'request_id'  =>  $PurchaseRequest->id,
	            'json_data' =>  json_encode($PurchaseRequest->data),
	        ]));
	        
	        return redirect( http_build_url($PurchaseRequest->data->return_url, array("query" => "token=$PurchaseRequest->ref"), HTTP_URL_JOIN_QUERY));

            
        }else{
            die('The API returned an error');
        }
    }
}