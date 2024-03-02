<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        //dd($request->method());
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                if(auth()->user()->hasRole("super-admin") == false){
                    return redirect(RouteServiceProvider::SIMPLEUSER);
                }

                return redirect(RouteServiceProvider::HOME);
            }
        }

        if(preg_match('/\/login/',  $request->url()) && $request->method() == "GET"){

            return redirect("/");

        }else if(preg_match('/\/register/',  $request->url()) && $request->method() == "GET"){

            return redirect("/");

        }

        return $next($request);
    }
}
