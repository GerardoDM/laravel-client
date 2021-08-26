<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class JwTMiddleware
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
        try {

            if ($request->cookie('name') !== null){
               // Auth::loginUsingId($request->cookie('name'));
                return $next($request);
            } else {
                return redirect('login');
            }
            

        } catch(\Exception $e) {

            return response('Unauthorized.', 401);
        }

        
    }

        
}


