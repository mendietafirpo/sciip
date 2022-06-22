<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $lang_reg = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

        if ($lang_reg && Session::get('lang')==null){
            if ($lang_reg=='en' || $lang_reg=='es' || $lang_reg=='it'){
                session()->put('lang',$lang_reg);
            }
        }
        if (Session::get('lang')){
            app()->setLocale(Session::get('lang'));
        }else{
            app()->setLocale('en');
        }
        return $next($request);
    }



}
