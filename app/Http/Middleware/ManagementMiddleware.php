<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ManagementMiddleware
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
        // $uga = $request->session()->get('user_access');
        $uga = auth()->user()->access_grant;
        if($uga != 2){
            if($uga == 1 || $uga == 3){
                return redirect('home');
            }
            return redirect('logout');
        }
        return $next($request);
    }
}
