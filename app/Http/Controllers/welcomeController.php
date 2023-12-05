<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use \App\Models\DepositMethod;

use App\Models\CoinSettings;

use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\nexha;
//require 'vendor/autoload.php';

function installDependency($command)
{
    
    $process = new Process(explode(' ', $command));
    
    $process->setTimeout(null);
    $process->run();
    
    if ($process->isSuccessful()) {
        echo 'Dépendance installée avec succès';
    } else {
        echo 'Erreur lors de l\'installation de la dépendance : ' . $process->getErrorOutput();
    }
}

class welcomeController extends Controller
{
    static function welcome()
    {
        
        //installDependency("composer require outhebox/laravel-translations");exit;
        return view('welcome',["deposit"=>DepositMethod::all(),
        "coins"=>CoinSettings::get(),
        "custom_method"=>Auth::check()?DB::table('custom_paiment')->where("id_user",Auth::user()->id)->where("type","cryptomonaie")->get():[],
        "admin_online"=>DB::table('admin_online')->where("id",1)->get()
    ]);
    }

    
}
