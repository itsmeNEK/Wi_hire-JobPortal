<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class c_AuthCheck
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

        if(!session()->has('Loggedcompany') && ($request->path() !='company_login' && $request->path() !='company_signup') ){
            return redirect('company_login')->with('fail','You Must Login');
        }elseif(session()->has('Loggedcompany') && ($request->path() =='company_login' || $request->path() =='company_signup' || $request->path() =='c_checkcode' || $request->path() =='user_login' || $request->path() =='user_signup' || $request->path() =='u_checkcode')){
            return back();
        }elseif(session()->has('Loggedcompany') && ($request->path() =='company_login' || $request->path() =='company_signup') ){
            return back();
        }elseif(session()->has('Loggedcompany') && ($request->path() =='admin_login' ) ){
            return back();
        }

        return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0,must-revalidate')
                            ->header('Pragma','no-cache')
                            ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');
    }
}
