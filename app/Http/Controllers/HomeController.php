<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Escrow;
use App\User;
use Twilio;
use App\Models\Otp;
use App\Models\Receive;
use App\Models\Transactions;
use App\Models\Currrency;
use App\Models\Country;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Page;
use Jenssegers\Agent\Agent;
use App\Models\CoinSettings;
use App\Models\DepositMethod;

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function gift_card()
    {  
        $country=country::get();
        return view('giftcard.index',compact(countrty));
    }

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['getPage']]);
    }

    public function getPage(Request $request, $id){
        
        $page = Page::where('id', $id)->first();

        if ($page != null) {
            return view('page.show')->with('page', $page);
        }

        return abort(404);
    }

    public function accountStatus(Request $request, $user){
        $user = User::findOrFail($user);
        $user->account_status = 0;
        $user->save();
        return back();
    }
    public function locale(Request $request, $locale){
        
        dd($locale);
        App::setLocale($locale);
        return view('welcome');
    }
    
    public function wallet(Request $request, $id){

        $currency = Auth::user()->walletByCurrencyId($id);
        if ($currency) {
            
            Auth::user()->currency_id = $id;
            Auth::user()->save();
        }
        return back();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $user=Auth::user();
        
       if(isset($_SESSION["buy_sell"]))
       {
            return redirect("/".$_SESSION["buy_sell"]);
       }
       
       $agent = new Agent();

       // Twilio::message('+258850586897', array(
       //     'body' => 'hihaa',
       //     'SERVICE SID'  =>  'Envato',
       // ));
       if (!Auth::user()->verified) {
           return view('otp.index');
       }

       $myMoneyRequests = Receive::with('From')->where('transaction_state_id', 3)->where('user_id', Auth::user()->id)->get();

       $myEscrows = Escrow::with('toUser')->where('user_id', Auth::user()->id)->where('escrow_transaction_status', '!=' ,'completed')->orderby('id', 'desc')->get();
       $toEscrows = Escrow::with('user')->where('to', Auth::user()->id)->where('escrow_transaction_status', '!=' ,'completed')->orderby('id', 'desc')->get();


        $buy_confirm=DB::table('buy_coins')->where('user_id', $user->id)->where("status","!=",0);
        // $transactions=DB::table('sell_coins')->where('user_id', $user->id)->where("status","!=",0)->union($buy_confirm)->orderByDesc("created_at")->get();

        $page = request()->get('page', 1);
        $sql = "SELECT  * from buy_coins where user_id = $user->id and status != 0 UNION SELECT  * from sell_coins where user_id = $user->id and status != 0";
        
        $queryBuilder = DB::table(DB::raw("($sql) as subquery"));
        $transactions = $queryBuilder->paginate(10);
    // ->fromSub($transactions, "");

        // dd($paginator);

       //$transactions = Auth::user()->RecentActivity()->with('Status')->orderby('id','desc')->where('transaction_state_id', '!=', 3)->paginate(10);
      // dd($transactions);

        $buy_to_confirm=DB::table('buy_coins')->where('user_id', $user->id)->where("status",0);
        // $transactionsToConfirm=DB::table('sell_coins')->where('user_id', $user->id)->where("status",0)->union($buy_to_confirm)->orderByDesc("created_at")->get();
        $transactionsToConfirm=DB::table('sell_coins')->where('user_id', $user->id)->where("status",0)->orderByDesc("created_at")->paginate(10);
       //$transactionsToConfirm =  Auth::user()->RecentActivity()->with('Status')->orderby('id','desc')->where('transaction_state_id', 3)->paginate(10);
       // $transactionsToConfirm =  Auth::user()->RecentActivity()->with('Status')->orderby('id','desc')->where('transaction_state_id', 3)->where('money_flow' , '!=', '+')->paginate(10);
       // if($agent->isMobile()){
       //     return view('_mobile.home.index')
       //     ->with('transactions', $transactions)
       //     ->with('transactions_to_confirm', $transactionsToConfirm);
       // }

       $user=Auth::user();

       $balance=DB::table('wallets')->where("user_id",$user->id)->first();

       $balance=$balance!=""?$balance:0.00;

       $earning=DB::table('affiliation')->select(DB::raw('SUM(amount) as earning'))->where('parent', $user->id)->get()[0]->earning;

       $earning=$earning!=""?$earning:0.00;

       HomeController::admin_online_manager();

       return view('home.index')
       ->with('myRequests', $myMoneyRequests)
       ->with('transactions', $transactions)
       ->with('myEscrows', $myEscrows)
       ->with('toEscrows', $toEscrows)
       ->with('transactions_to_confirm', $transactionsToConfirm)
       ->with('affiliated', user::where("affiliation_parent",auth::user()->id)->count())
       ->with("earning",$earning)
       ->with('balance',$balance)
       ->with('total_buy', DB::table('buy_coins')->where("user_id",$user->id)->where("status",1)->count())
       ->with('total_sell', DB::table('sell_coins')->where("user_id",$user->id)->where("status",1)->count())
       ->with('rejected', DB::table('buy_coins')->where("user_id",$user->id)->where("status",2)->count()+DB::table('sell_coins')->where("user_id",$user->id)->where("status",2)->count())
       ->with('total_buy_sell',DB::table('buy_coins')->select(DB::raw('SUM(amount) as earning'))->where('user_id', $user->id)->where("status",1)->get()[0]->earning+DB::table('sell_coins')->select(DB::raw('SUM(amount) as earning'))->where('user_id', $user->id)->where("status",1)->get()[0]->earning);
        
    }

    public static function index_getter()
    {
        $user=Auth::user();

        $agent = new Agent();

        // Twilio::message('+258850586897', array(
        //     'body' => 'hihaa',
        //     'SERVICE SID'  =>  'Envato',
        // ));
        if (!Auth::user()->verified) {
            return view('otp.index');
        }

        $myMoneyRequests = Receive::with('From')->where('transaction_state_id', 3)->where('user_id', Auth::user()->id)->get();

        $myEscrows = Escrow::with('toUser')->where('user_id', Auth::user()->id)->where('escrow_transaction_status', '!=' ,'completed')->orderby('id', 'desc')->get();
        $toEscrows = Escrow::with('user')->where('to', Auth::user()->id)->where('escrow_transaction_status', '!=' ,'completed')->orderby('id', 'desc')->get();


        $buy_confirm=DB::table('buy_coins')->where('user_id', $user->id)->where("status","!=",0);
        $transactions=DB::table('sell_coins')->where('user_id', $user->id)->where("status","!=",0)->union($buy_confirm)->orderByDesc("created_at")->get();
        
        //$transactions = Auth::user()->RecentActivity()->with('Status')->orderby('id','desc')->where('transaction_state_id', '!=', 3)->paginate(10);
       // dd($transactions);

        $buy_to_confirm=DB::table('buy_coins')->where('user_id', $user->id)->where("status",0);
        $transactionsToConfirm=DB::table('sell_coins')->where('user_id', $user->id)->where("status",0)->union($buy_to_confirm)->orderByDesc("created_at")->get();
        //$transactionsToConfirm =  Auth::user()->RecentActivity()->with('Status')->orderby('id','desc')->where('transaction_state_id', 3)->paginate(10);
        // $transactionsToConfirm =  Auth::user()->RecentActivity()->with('Status')->orderby('id','desc')->where('transaction_state_id', 3)->where('money_flow' , '!=', '+')->paginate(10);
        // if($agent->isMobile()){
        //     return view('_mobile.home.index')
        //     ->with('transactions', $transactions)
        //     ->with('transactions_to_confirm', $transactionsToConfirm);
        // }

        return(["myRequests"=>$myMoneyRequests,"transactions"=>$transactions,'myEscrows'=>$myEscrows,'toEscrows'=>$toEscrows,'transactions_to_confirm'=>$transactionsToConfirm]);
    }

   

    public static function customer_paiement(Request $request){

        if($request->level)
        {
            if($request->level=="update")
            {
                DB::table('custom_paiment')

                ->where("id",$request->id)

                ->update([
                    
                    'name' => $request->nom,
                    'number'=>$request->number,
                    "detail"=>$request->detail,
                    "type"=>$request->type
                    ]
                );

                return back();
            }

            if($request->level=="new")
            {
                DB::table('custom_paiment')->insert([
                    'id_user' => Auth::user()->id,
                    'name' => $request->nom,
                    'number'=>$request->number,
                    "detail"=>$request->detail,
                    "type"=>$request->type
                    ]
                );

                return back();
            }
        }

        $method=DB::table('custom_paiment')->where("id_user",Auth::user()->id)->where("type","monaie")->orderBy("name")->get();
        $crypto=DB::table('custom_paiment')->where("id_user",Auth::user()->id)->where("type","cryptomonaie")->orderBy("name")->get();

        return view("customer_paiement",["method"=>$method,"crypto"=>$crypto,"coins"=>CoinSettings::get(),"deposit_method"=>DepositMethod::all()]);
    
    }

    public static function customer_paiement_delet(Request $request){

        $id=$request->id;

        $method=DB::table('custom_paiment')->where("id",$id)->first();

        if(!empty($method))
        {
            if($method->id_user==Auth::user()->id)
            {
                DB::table('custom_paiment')->where("id",$id)->delete();
                return back();
            }
        }
    }

    public static function admin_online_manager(){

        $min=0;
        $max=23;

        date_default_timezone_set('Africa/Douala');

        $online = DB::table('admin_online')->find(1);

        $H=(int)explode(":",date("H:i:s"))[0];

        $AH=(int)explode(":",date("H:i:s",$online->date))[0];
        



        if($H>=$max || $H<=$min)
        {
            if($AH<$max || $AH>$min)
            {
                DB::table('admin_online')

                ->where('id', 1)
  
                ->update([
                      'status' => 0,
                      
                  ]);
            }
        }
        else{

            if($AH>$max || $AH<$min)
            {
                DB::table('admin_online')

                ->where('id', 1)
  
                ->update([
                      'status' => 1,
                      
                  ]);
            }
        }
    }
}


 