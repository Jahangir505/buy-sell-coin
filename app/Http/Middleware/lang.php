<?php
 
namespace App\Http\Middleware;

use App\Http\Controllers\HomeController;

use Illuminate\Http\Request;
 
use Closure;
 
class lang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( \Session::has('lang')) {
            // Récupération de la 'lang' dans Session et activation
            \App::setLocale(\Session::get('lang'));
        }

        HomeController::admin_online_manager();
 
        return $next($request);
    }
}