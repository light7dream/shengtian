<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MemberVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->session()->has('user'))
        {
            if($request->session()->has('qrcode')){
                $keys = ['invoices', 'login', 'register'];
                $key = explode('/', $request->path())[0];
                if(!in_array($key, $keys, true)){
                    return redirect('/login');
                }
            }else{
                $keys = ['login', 'register'];
                $key = explode('/', $request->path())[0];
                if(!in_array($key, $keys, true)){
                    return redirect('/login');
                }
            }
        }
        if(($request->path()=='login' ||$request->path()=='register') && $request->session()->has('user')){
            return redirect('/');
        }
        return $next($request);
    }
}