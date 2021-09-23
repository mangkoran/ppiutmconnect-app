<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MemberMiddlewareware
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
        $uga = auth()->user()->access_grant;
        if($uga != 1){
            if($uga == 2 || $uga == 3){
                return redirect('home');
            }
            return redirect('logout');
        }
        return $next($request);
    }
}
