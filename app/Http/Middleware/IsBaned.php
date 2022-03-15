<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsBaned
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
        if(Auth::user()->isBaned == 1){
            Auth::logout();
            return redirect()->route('login')->with("alert", ["icon"=>"error", "title"=>"Banned User", "message"=>"Admin ကိုဆက်သွယ်ပါ"]) ;
        }
        return $next($request);
    }
}
