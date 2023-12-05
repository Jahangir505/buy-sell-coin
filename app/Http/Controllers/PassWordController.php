<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\resetPasswordEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


use Illuminate\Support\Facades\DB;

class PassWordController extends Controller
{
    
    public static function index(Request $rquest)
    {
        $existe=false;

        $user= DB::table('users')->where('email', $rquest->email)->get()->first();
        
        if($user){
       
            $existe=true;
            
            $pass=rand(11111,99999);

            session()->flash('newpass',$pass);

            session()->flash('newpassuser',$user->id);

            Mail::send(new resetPasswordEmail($pass,$rquest->email));
        }
        

        return view("resetTokenForm",["existe"=>$existe]);
    }

    public static function valid(Request $rquest)
    {
        session()->flash('newpass',session("newpass"));

        session()->flash('newpassuser',session("newpassuser"));

        if($rquest->confirm!=session("newpass")){
        
            return view("resetTokenForm",["errconfirm"=>"test","existe"=>true]);
        }

        if($rquest->newpass!=$rquest->newpassconfirm){
        
            return view("resetTokenForm",["errpass"=>"test","existe"=>true]);
        }


        $user= DB::table('users')->where('id', session("newpassuser"))
            
        ->update(['password' => bcrypt($rquest->newpass)]);

        return redirect()->route("login");
    }
}
