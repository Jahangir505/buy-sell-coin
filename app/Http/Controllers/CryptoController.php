<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\Escrow;

use App\User;

use Twilio;

use App\Models\Otp;

use App\Models\Receive;

use App\Models\Transaction;

use App\Models\Currrency;

use App\Models\BuyCoins;

use App\Models\Wallet;

use App\Models\Country;

use App\Models\GeneralSetting;

use App\Models\CoinSettings;

use Illuminate\Http\Request;

use TCG\Voyager\Models\Page;

use Jenssegers\Agent\Agent;

use App\Models\SellCrypto;

use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\DB;

class CryptoController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function buy_pending_requests()

    {  

        $data = [];

        $data['type'] = 'pending_requests';

        $data['requests'] = BuyCoins::where(['status'=>0])->with('user')->orderBy('id', 'DESC')->paginate(15);

        // dd($data['requests']);

        return view('vendor.voyager.crypto.buy_requests',$data);

    }

    public function buy_approved_requests()

    {  

        $data = [];

        $data['type'] = 'approved_request';

        $data['requests'] = BuyCoins::where(['status'=>1])->with('user')->orderBy('id', 'DESC')->paginate(15);

        // dd($data['requests']);

        return view('vendor.voyager.crypto.buy_requests',$data);

    }

    public function buy_reject_requests()

    {  

        $data = [];

        $data['type'] = 'reject_requests';

        $data['requests'] = BuyCoins::where(['status'=>2])->with('user')->orderBy('id', 'DESC')->paginate(15);

        // dd($data['requests']);

        return view('vendor.voyager.crypto.buy_requests',$data);

    }

    public function sell_pending_requests()

    {  

        $data = [];

        $data['type'] = 'pending_requests';

        $data['requests'] = SellCrypto::where(['status'=>0])->with('user')->orderBy('id', 'DESC')->paginate(15);

        // dd($data['requests']);

        return view('vendor.voyager.crypto.sell_requests',$data);

    }

    public function sell_approved_requests()

    {  

        $data = [];

        $data['type'] = 'approved_request';

        $data['requests'] = SellCrypto::where(['status'=>1])->with('user')->orderBy('id', 'DESC')->paginate(15);

        // dd($data['requests']);

        return view('vendor.voyager.crypto.sell_requests',$data);

    }

    public function sell_reject_requests()

    {  

        $data = [];

        $data['type'] = 'reject_requests';

        $data['requests'] = SellCrypto::where(['status'=>2])->with('user')->orderBy('id', 'DESC')->paginate(15);

        // dd($data['requests']);

        return view('vendor.voyager.crypto.sell_requests',$data);

    }

    public function update_sell_crypto_status($id,Request $request)

    {  

        $this->validate($request,[

            'status'=>'required',

        ]);

        $status= $request->status;

        $sell = SellCrypto::find($id);

        $trx = $sell->trx;

        $transaction = Transaction::where(['transactionable_id'=>$trx])->first();



        $user_id = $sell->user_id;

        $currency_id = $transaction->currency_id;

        $wallet = Wallet::where(['user_id'=>$user_id,'currency_id'=>$currency_id])->first();

        $trx_status = 2;

        if($status == 1)

        {

            $trx_status = 1;

        }

        if($status == 1)

        {

            $total_amount = $sell->total_amount;

            $wallet->amount = ($wallet->amount + $total_amount);

            $wallet->save();

            $fee_amount = 0;

            Transaction::where(['transactionable_id'=>$trx])->delete();

            Transaction::create([

                'user_id' =>  $user_id,

                'entity_id'   =>  $id,

                'transactionable_id'=>$trx,

                'entity_name' =>  isset($transaction->entity_name) ? $transaction->entity_name:'',

                'transaction_state_id'  => 1,

                'money_flow'    => '+',

                'activity_title'    =>  'Sell Crypto',

                'currency_id' =>  $currency_id,

                'currency_symbol' =>  $wallet->currency->symbol,

                'thumb' =>  $wallet->currency->thumb,

                'gross' =>  $total_amount,

                'fee'   =>  $fee_amount,

                'net'   =>  $total_amount,

                'balance'   =>  $wallet->amount,

            ]);

            $this->affiliation($id,"sell");
        }

        else

        {

            $transaction->transaction_state_id=$trx_status;

            $transaction->save();

        }

        $sell->status = $status;

        $sell->save();

        


       return back()->with(['message' => "Done Successfully", 'alert-type' => 'success']);

    }

    public function update_buy_crypto_status($id,Request $request)

    {  

        $preuve = isset($request->preuve) ? $request->preuve:'';

        if($preuve)

        {

            $path = 'assets/admin_preuve';

            $size = '800x800';

            $preuve = $this->uploadImage($preuve, $path, $size);

            

        }

        $this->validate($request,[

            'status'=>'required',

        ]);

        $status= $request->status;

        $buy = BuyCoins::find($id);

        $trx = $buy->trx;

        $transaction = Transaction::where(['transactionable_id'=>$trx])->first();



        $user_id = $buy->user_id;

        $currency_id = $transaction->currency_id;

        $wallet = Wallet::where(['user_id'=>$user_id,'currency_id'=>$currency_id])->first();

        $trx_status = 2;

        if($status == 1)

        {

            $trx_status = 1;

            $buy->preuve=$preuve;

            $this->affiliation($id,"buy");

        }

        if($status == 2)

        {

            $total_amount = $buy->total_amount;

            $wallet->amount = ($wallet->amount + $total_amount);

            $wallet->save();

            $fee_amount = 0;

            Transaction::where(['transactionable_id'=>$trx])->delete();

            Transaction::create([

                'user_id' =>  $user_id,

                'entity_id'   =>  $id,

                'transactionable_id'=>$trx,

                'entity_name' =>  isset($transaction->entity_name) ? $transaction->entity_name:'',

                'transaction_state_id'  => 2, // waiting confirmation

                'money_flow'    => '+',

                'activity_title'    =>  'Buy Crypto',

                'currency_id' =>  $currency_id,

                'currency_symbol' =>  $wallet->currency->symbol,

                'thumb' =>  $wallet->currency->thumb,

                'gross' =>  $total_amount,

                'fee'   =>  $fee_amount,

                'net'   =>  $total_amount,

                'balance'   =>  $wallet->amount

                

            ]);

        }

        else

        {

            $transaction->transaction_state_id=$trx_status;

            $transaction->save();

        }

        $buy->status = $status;

        $buy->save();

        

        return back()->with(['message' => "Done Successfully", 'alert-type' => 'success']);

    }

    public function affiliation($id,$type)
    {
        
        $parent=false;

        //$user=auth::user()->id;

        if($type=="buy")
        {
            $data=DB::table('buy_coins')->find($id);
            
        }

        if($type=="sell")
        {
            $data = DB::table('sell_coins')->find($id);
        }

        $user_id=$data->user_id;

        $user=DB::table('users')->find($user_id);
        

        $default_parent=$user->affiliation_parent;

        

        $amount = $data->total_amount*0.004;

        $parent=($default_parent && $default_parent>0)?$default_parent:false;

        
        if($parent && $user_id!=$parent)
        {
            DB::table('affiliation')->insert([
                'parent' => $parent,
                'user' => $user_id,
                'amount'=>$amount,
                'time'=>time()
            ]);

            $wallet=DB::table('wallets')->where("user_id",$parent)->first();

            $wallet_amount=$wallet->amount;

            $wallet->amount=$wallet_amount+$amount;

            //$wallet->save();

            DB::table('wallets')
              ->where('user_id', $parent)
              ->update(['amount' => $wallet_amount+$amount]);
        }

        
        
    }

    private function uploadImage($file, $location, $size = null, $old = null, $thumb = null)

    {

        $path = $this->makeDirectory($location);

        if (!$path) throw new Exception('File could not been created.');

        if ($old) {

            $this->removeFile($location . '/' . $old);

            $this->removeFile($location . '/thumb_' . $old);

        }

        $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();

        $image = Image::make($file);

        if ($size) {

            $size = explode('x', strtolower($size));

            $image->resize($size[0], $size[1]);

        }

        $image->save($location . '/' . $filename);

        if ($thumb) {

            $thumb = explode('x', $thumb);

            Image::make($file)->resize($thumb[0], $thumb[1])->save($location . '/thumb_' . $filename);

        }

        return $filename;

    }

    private function makeDirectory($path)

    {

        if (file_exists($path)) return true;

        return mkdir($path, 0755, true);

    }

    private function removeFile($path)

    {

        return file_exists($path) && is_file($path) ? @unlink($path) : false;

    }

    public function generateRandomString($length = 10) 

    {

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $charactersLength = strlen($characters);

        $randomString = '';

        for ($i = 0; $i < $length; $i++) 

        {

            $randomString .= $characters[rand(0, $charactersLength - 1)];

        }

        return $randomString;

    }

}