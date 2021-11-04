<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class a_AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('adminLogged') && ($request->path() !='admin_login') ){
            return redirect('admin_login')->with('fail','You Must Login');
        }elseif(session()->has('adminLogged') && ($request->path() =='user_login' || $request->path() =='user_signup' || $request->path() =='u_checkcode' || $request->path() =='company_login' || $request->path() =='company_signup' || $request->path() =='c_checkcode' || $request->path() =='user_login')){
            return back();
        }elseif(session()->has('adminLogged') && ($request->path() =='user_login' || $request->path() =='user_signup') ){
            return back();
        }elseif(session()->has('adminLogged') && ($request->path() =='admin_login' ) ){
            return back();
        }

        return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0,must-revalidate')
                            ->header('Pragma','no-cache')
                            ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');
    }
}
