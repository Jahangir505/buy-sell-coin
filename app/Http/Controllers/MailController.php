<?php
namespace App\Http\Controllers;
use Auth;
use Mail;
use App\User;
use Illuminate\Http\Request;
use App\Mail\Admin\sendToRegisteredUser;
class MailController extends Controller{
    public function index(){
        return view('vendor.voyager.mails.browse');
    }
    
    public function send(Request $request){
        
         $this->validate($request, [
             'subject'=>'required',
             'content'=>'required',
             ]);
        
        
        $users = User::all();
        foreach($users as $user){
            Mail::send(new sendToRegisteredUser($request->subject,$request->content, $user));
        }
        
        
        return redirect()->route('admin.mail.index',['success'=>true]);
    }
}