<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class a_AuthCheck
{
    private $unwantedHeaderList = [
        'X-Powered-By',
        'Server',
    ];
    private function removeUnwantedHeaders($headerList)
    {
        foreach ($headerList as $header)
            header_remove($header);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $this->removeUnwantedHeaders($this->unwantedHeaderList);

        if(!session()->has('adminLogged') && ($request->path() !='admin_login') ){
            return redirect('admin_login')->with('fail','You Must Login');
        }elseif(session()->has('adminLogged') && ($request->path() =='user_login' || $request->path() =='user_signup' || $request->path() =='u_checkcode' || $request->path() =='company_login' || $request->path() =='company_signup' || $request->path() =='c_checkcode' || $request->path() =='user_login')){
            return back();
        }elseif(session()->has('adminLogged') && ($request->path() =='user_login' || $request->path() =='user_signup') ){
            return back();
        }elseif(session()->has('adminLogged') && ($request->path() =='admin_login' ) ){
            return back();
        }
        $response = $next($request);
        $response->headers->set('Referrer-Policy', 'no-referrer-when-downgrade');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        $response->headers->set('Content-Security-Policy', "default-src 'self'; img-src https://*; child-src 'none';");
        $response->header('Cache-Control','no-cache, no-store, max-age=0,must-revalidate');
        $response->header('Pragma','no-cache');
        $response->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');

        return $response;
    }
}
