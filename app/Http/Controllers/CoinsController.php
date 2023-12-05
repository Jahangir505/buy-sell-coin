<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\HomeController;

use Auth;

use App\Models\Escrow;

use App\User;

use Twilio;

use resetPasswordEmail;

use App\Models\Otp;

use App\Models\Receive;

use App\Models\CoinSettings;

use App\Models\BuyCoins;

use App\Models\SellCrypto;

use App\Models\Transaction;

use App\Models\Currrency;

use App\Models\Country;

use App\Models\DepositMethod;


use App\Models\GeneralSetting;

use Illuminate\Http\Request;

use TCG\Voyager\Models\Page;

use Jenssegers\Agent\Agent;

use Mail;

use App\Mail\GiftCardEmail;

use Intervention\Image\Facades\Image;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Transactions;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\nexha;






class CoinsController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        

    }

    public function buyCoin()

    {

        $data = [];

        $coins = CoinSettings::get();

        $data['coins'] = $coins;

        $sended_data=homeController::index_getter();

        $sended_data["data"]=$coins;

        $sended_data["deposit"]=DepositMethod::all();
        $sended_data["custom_method"]=DB::table('custom_paiment')->where("id_user",Auth::user()->id)->where("type","cryptomonaie")->get();
        $sended_data["admin_online"]=(DB::table('admin_online')->where("id",1)->get());


       return view('coins.buy_coin',$sended_data);

    }

    public function sellCoin()

    {

        $data = [];

        $coins = CoinSettings::get();

        $data['coins'] = $coins;

        $sended_data=homeController::index_getter();

        $sended_data["data"]=$coins;

        $sended_data["deposit"]=DepositMethod::all();
        $sended_data["admin_online"]=(DB::table('admin_online')->where("id",1)->get());

        return view('coins.sell_coin',$sended_data);

    }

    /** Confirm les données d'achat et affiche les adresse de paiement */
    public function postBuyCryptoConfirm(Request $request){

        if(!Auth::check()){
            

            $_SESSION['buy_sell']="postBuyCryptoConfirm";

            $data_request=[

            "coin_id"=>$request->coin_id,

            "wallet_address"=>$request->wallet_address,

            "pay_method"=>$request->pay_method,

            "receipt"=>$request->receipt,

            "amount"=>$request->amount,

            "crypto_amount"=>$request->crypto_amount,

            "exchange_rate"=>$request->exchange_rate

            ];

            $_SESSION['request']=$data_request;
            

            return redirect("/home");
           
        }

        if(isset($_SESSION['buy_sell']))
        {
            $data=(object)$_SESSION['request'];
            
            unset($_SESSION['request']);
            
            unset($_SESSION['buy_sell']);

           
        } 

        else{
            $data=$request;
        }

        if($request->custom_method){
        
            if($request->number!=""){
            
                DB::table('custom_paiment')->insert([
                    'id_user' => Auth::user()->id,
                    'name' => $request->nom,
                    'number'=>$request->number,
                    "detail"=>$request->detail,
                    "type"=>$request->type
                    ]
                );
            }
        }
        

        return view('coins/postCryptoConfirm',["want"=>"buy","data"=>$data,"coin_data"=>CoinSettings::get(),"deposit"=>DepositMethod::all(),"custom_method"=>DB::table('custom_paiment')->where("id_user",Auth::user()->id)->where("type","cryptomonaie")->get()]);

    }

    public function postSellCryptoConfirm(Request $request){
        
        if(!Auth::check()){
            
            if($request->custom_method){

                if($request->number!=""){
                    DB::table('custom_paiment')->insert([
                        'id_user' => Auth::user()->id,
                        'name' => $request->nom,
                        'number'=>$request->number,
                        "detail"=>$request->detail,
                        "type"=>$request->type
                        ]
                    );
                }
            }

            $_SESSION['buy_sell']="postBuyCryptoConfirm";

            $data_request=[

            "coin_id"=>$request->coin_id,

            "wallet_address"=>$request->wallet_address,

            "pay_method"=>$request->pay_method,

            "receipt"=>$request->receipt,

            "amount"=>$request->amount,

            "crypto_amount"=>$request->crypto_amount,

            "exchange_rate"=>$request->exchange_rate

            ];

            $_SESSION['request']=$data_request;
            

            return redirect("/home");
           
        }

        if(isset($_SESSION['buy_sell']))
        {
            $data=(object)$_SESSION['request'];
            
            unset($_SESSION['request']);
            
            unset($_SESSION['buy_sell']);

           
        } 

        else{
            $data=$request;
        }

        

        return view('coins/postCryptoConfirm',["want"=>"sell","data"=>$data,"coin_data"=>DB::table('coin_settings')->get(),"deposit"=>DepositMethod::all(),"custom_method"=>DB::table('custom_paiment')->where("id_user",Auth::user()->id)->where("type","monaie")->get()]);

    }

    public function postBuyCrypto(Request $request)

    {
        $affiliation_parent= isset($_SESSION["parent_affiliation"])?$_SESSION["parent_affiliation"]:"";
        
        $wallet = Auth::user()->currentWallet();

        $balance = $wallet->amount;

        $this->validate($request,[

            'coin_id'=>'required',

            'amount'=>'required',

            

        ]);

        $receipt = isset($request->receipt) ? $request->receipt:'';

        $deposit_method = isset($request->pay_method) ? $request->pay_method:'';

        $wallet_address = isset($request->wallet_address) ? $request->wallet_address:'';

        $coin_id = isset($request->coin_id) ? $request->coin_id:'';

        $amount = isset($request->amount) ? $request->amount:'';

        $coin_settings = $this->getCoinDetail($coin_id);

        $exchange_rate = isset($coin_settings->exchange_rate) ? $coin_settings->exchange_rate:0;

        $crypto_name = isset($coin_settings->coin_name) ? $coin_settings->coin_name:'';

        $crypto_amount = ($exchange_rate * $amount);

        $total_amount = $amount;

        $trx = $this->generateRandomString();

        

        if((float)($total_amount >  $balance))

        {

            flash('You have low balance', 'danger');

            //return back();

        }

        $fee_amount = 0;

        $wallet->amount = ($wallet->amount - $total_amount);

        $wallet->save();

        $buyCoins = new BuyCoins();

        $buyCoins->user_id = Auth::user()->id;

        $buyCoins->crypto = $crypto_name;

        $buyCoins->coin_id = $coin_id;

        $buyCoins->exchange_rate = $exchange_rate;

        $buyCoins->crypto_amount = $crypto_amount;

        $buyCoins->amount = $total_amount;

        $buyCoins->total_amount = $total_amount;

        $buyCoins->wallet_address = $wallet_address;

        $buyCoins->trx = $trx;

        $buyCoins->deposit_method = $deposit_method;

        $buyCoins->parent_affiliation = $affiliation_parent;

        if($receipt)

        {

            $path = 'assets/receipt';

            $size = '800x800';

            $receipt = $this->uploadImage($receipt, $path, $size);

            $buyCoins->receipt = $receipt;

        }

        $buyCoins->save();

        Transaction::create([

            'user_id' =>  Auth::user()->id,

            'entity_id'   =>  $buyCoins->id,

            'transactionable_id'=>$trx,

            'entity_name' =>  $wallet->currency->name,

            'transaction_state_id'  => 3, // waiting confirmation

            'money_flow'    => '-',

            'activity_title'    =>  'Buy Crypto',

            'currency_id' =>  $wallet->currency->id,

            'currency_symbol' =>  "$",

            'thumb' =>  $wallet->currency->thumb,

            'gross' =>  $total_amount,

            'fee'   =>  $fee_amount,

            'net'   =>  $total_amount,

            'balance'   =>  $wallet->amount,

            'crypto'=>$crypto_name

        ]);

        //'currency_symbol' =>  $wallet->currency->symbol,
        $support=DB::table('phone_support')->find(1)->phone;

        $message="<span class=\"f-title\">Transaction soumis et en cours de traitement</span> <span class=\"f-message\">Veuillez nous ecrire via le chat instantané ou sur <a href=\"https://wa.me/".$support."\">whatsapp au ".$support."</a>  si vous rencontrez un probleme. </span> <span class=\"f-message\">Merci de faire confiance à probuysell.</span>" ;
        
        flash($message, 'info');

        $message= Auth::user()->name." a initié une operation d'achat sur probuysell \r https://probuysellcoin.com/admin";
        
        nexha::message($message,"674465093");

        if($request->custom_method){
        
            DB::table('custom_paiment')->insert([
                'id_user' => Auth::user()->id,
                'name' => $request->nom,
                'number'=>$request->number,
                "detail"=>$request->detail,
                "type"=>$request->type
                ]
            );
        }
            
        
        return redirect("/home");

    }

    public function postSellCrypto(Request $request)

    {
        /*Schema::table('sell_coins', function (Blueprint $table) {
            $table->text('paiement_address');echo "ok";
        });*/

        $affiliation_parent= isset($_SESSION["parent_affiliation"])?$_SESSION["parent_affiliation"]:"";

        $wallet = Auth::user()->currentWallet();

        $balance = $wallet->amount;

        $this->validate($request,[

            'coin_id'=>'required',

            'amount'=>'required',

        ]);

        $receipt = isset($request->receipt) ? $request->receipt:'';

        $pay_address = isset($request->pay_address) ? $request->pay_address:'';

        $coin_id = isset($request->coin_id) ? $request->coin_id:'';

        $amount = isset($request->amount) ? $request->amount:'';

        $coin_settings = $this->getCoinDetail($coin_id);

        $exchange_rate = isset($coin_settings->exchange_rate) ? $coin_settings->exchange_rate:0;

        $crypto_name = isset($coin_settings->coin_name) ? $coin_settings->coin_name:'';

        $wallet_address = isset($coin_settings->wallet_address) ? $coin_settings->wallet_address:'';

        $crypto_amount = ($exchange_rate * $amount);

        $total_amount = $amount;

        $trx = $this->generateRandomString();

        $fee_amount = 0;

        // $wallet->amount = ($wallet->amount + $total_amount);

        // $wallet->save();

        $deposit_method = isset($request->pay_method) ? $request->pay_method:'';
        

        $crypto = new SellCrypto();

        if($receipt)

        {

            $path = 'assets/receipt';

            $size = '800x800';

            $receipt = $this->uploadImage($receipt, $path, $size);

            $crypto->receipt = $receipt;

        }

        $crypto->user_id = Auth::user()->id;

        $crypto->crypto = $crypto_name;

        $crypto->coin_id = $coin_id;

        $crypto->exchange_rate = $exchange_rate;

        $crypto->crypto_amount = $crypto_amount;

        $crypto->amount = $total_amount;

        $crypto->total_amount = $total_amount;

        $crypto->wallet_address = $wallet_address;

        $crypto->paiement_address = $pay_address;

        

        $crypto->trx = $trx;

        $crypto->deposit_method = $deposit_method;

        $crypto->parent_affiliation = $affiliation_parent;

        $crypto->save();

        Transaction::create([

            'user_id' =>  Auth::user()->id,

            'entity_id'   =>  $crypto->id,

            'transactionable_id'=>$trx,

            'entity_name' =>  $wallet->currency->name,

            'transaction_state_id'  => 3, // waiting confirmation

            'money_flow'    => '+',

            'activity_title'    =>  'Sell Crypto',

            'currency_id' =>  $wallet->currency->id,

            'currency_symbol' =>  '$',

            'thumb' =>  $wallet->currency->thumb,

            'gross' =>  $total_amount,

            'fee'   =>  $fee_amount,

            'net'   =>  $total_amount,

            'balance'   =>  $wallet->amount,

            'crypto'=>"$crypto_name"

        ]);

        
        $support=DB::table('phone_support')->find(1)->phone;
             
        $message="<span class=\"f-title\">Transaction soumis et en cours de traitement</span> <span class=\"f-message\">Veuillez nous ecrire via le chat instantané ou sur <a href=\"https://wa.me/".$support."\">whatsapp au ".$support."</a>  si vous rencontrez un probleme. </span> <span class=\"f-message\">Merci de faire confiance à probuysell.</span>" ;
        
        flash($message, 'info');

        session()->flash("message",$message);

        //Twilio::message('+237674465093', Auth::user()->name." a initié une operation de vente sur probuysell \r https://probuysellcoin.com/admin");


        $message= Auth::user()->name." a initié une operation de vente sur probuysell \r https://probuysellcoin.com/admin";
        
        nexha::message($message,"674465093");

        if($request->custom_method){
        
            DB::table('custom_paiment')->insert([
                'id_user' => Auth::user()->id,
                'name' => $request->nom,
                'number'=>$request->number,
                "detail"=>$request->detail,
                "type"=>$request->type
                ]
            );
        }

        return redirect("/home");

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

    private function getCoinDetail($id=null)

    {

        $data = [];

        if($id!=null)

        {

            $coin_settings = CoinSettings::find($id);

            $data['id']=isset($coin_settings->id) ? $coin_settings->id:'';

            $data['coin_name']=isset($coin_settings->coin_name) ? $coin_settings->coin_name:'';

            $data['exchange_rate']=isset($coin_settings->price) ? $coin_settings->price:0;

            $data['wallet_address']=isset($coin_settings->wallet_address) ? $coin_settings->wallet_address:'';

        }

        return (object)$data;

    }

    //affiliation
    public function affiliation()

    {

        $user=Auth::user();

        $user_affiliateds=[];

        $affiliated_logs=[];

        $affiliated = DB::table('affiliation')->where('parent', $user->id)->orderBy("time","asc")->groupBy('user')->paginate(15);

        $affiliated_log = DB::table('affiliation')->where('parent', $user->id)->where('amount',">", 0)->orderBy("time","desc")->paginate(15);

        $earning=DB::table('affiliation')->select(DB::raw('SUM(amount) as earning'))->where('parent', $user->id)->get()[0]->earning;

        $detail=[
                "affiliated"=>count(DB::table('users')->select(DB::raw('SUM(id) as affiliated'))->where('affiliation_parent', $user->id)->groupBy('id')->get()),

                "earning"=>($earning!="")?$earning:0,

                "account"=>DB::table('wallets')->where("user_id",Auth::user()->id)->first()
        ];
       

        foreach($affiliated as $value)
        {
            
            $users=user::find($value->user);

            if($users)
            {
                
                $value->name=$users->name;
            }

            else{
                $value->name="Indisponible";
            }
                $value->date=DB::table('affiliation')->where('parent', $user->id)->where('user', $value->user)->max("created_at");;

                

                $value->earning=DB::table('affiliation')->select(DB::raw('SUM(amount) as earning'))->where('parent', $user->id)->where('user', $value->user)->get()[0]->earning;

                $value->number=DB::table('affiliation')->where('parent', $user->id)->where('amount', ">",0)->where('user', $value->user)->count();
            
            
        }

        foreach($affiliated_log as $value)
        {
            $value->name=user::find($value->user)?user::find($value->user)->name:"Indisponible";
        }

       return view('affiliation.affiliation',["user"=>$user,'wallet'=>DB::table('wallets')->where("user_id",Auth::user()->id)->first(),"detail"=>$detail,"affiliated"=>$affiliated,"affiliated_log"=>$affiliated_log]);

    }


    //admin phone support
    public  function phone_support_view()
    {
        $phone = DB::table('phone_support')->find(1);

        return view('vendor.voyager.support.phone',["phone"=>$phone->phone]);
    }

    

    public  function phone_support_save(Request $request)
    {
        $affected = DB::table('phone_support')

              ->where('id', 1)

              ->update(['phone' => $request->phone]);

              return back();
    }

    //online
    public  function online()
    {
        $online = DB::table('admin_online')->find(1);

        return view('vendor.voyager.support.admin_online',["status"=>$online->status]);
    }


    public  function online_change(Request $request)
    {
        date_default_timezone_set('Africa/Douala');

        $affected = DB::table('admin_online')

            ->where('id', 1)

            ->update([
                'status' => $request->status,
                'date' => time()
            ]);

        return back();
    }

    public static function son()
    {
        $buy=DB::table('buy_coins')->where("status",0)->whereJsonDoesntContain("notify",Auth::user()->id)->count();

        $sell=DB::table('sell_coins')->where("status",0)->whereJsonDoesntContain("notify",Auth::user()->id)->count();

        $retrait=DB::table('withdrawals')->where("transaction_state_id",3)->whereJsonDoesntContain("notify",Auth::user()->id)->count();

        
        
        echo json_encode(["b"=>$buy,"s"=>$sell,"w"=>$retrait]);


        if($buy>0)
        {
            
            $stat=DB::table('buy_coins')->where("status",0)->get()[0]->notify;

            $stat=json_decode($stat,1);

            $stat[]=Auth::user()->id;

            DB::table('buy_coins')

              ->where("status",0)

              ->whereJsonDoesntContain("notify",Auth::user()->id)

              ->update(['notify' => json_encode($stat)]);

        }

        if($sell>0)
        {

            $stat=DB::table('sell_coins')->where("status",0)->get()[0]->notify;

            $stat=json_decode($stat,1);

            $stat[]=Auth::user()->id;

              DB::table('sell_coins')

              ->where("status",0)

              ->whereJsonDoesntContain("notify",Auth::user()->id)

              ->update(['notify' => json_encode($stat)]);

              
              
        }

        if($retrait>0)
        {

            $stat=DB::table('withdrawals')->where("transaction_state_id",3)->whereJsonDoesntContain("notify",Auth::user()->id)->get()[0];

            $stats=json_decode($stat->notify,1);

            $stats[]=Auth::user()->id;

              DB::table('withdrawals')

              ->where("transaction_state_id",3)

              ->whereJsonDoesntContain("notify",Auth::user()->id)

              ->update(['notify' => json_encode($stats)]);

              
        }
    }


}