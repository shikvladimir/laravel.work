<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToAdmin
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
        $user = Auth::user()->getAuthIdentifier();

        if($user != 1){
//            return redirect('/')->with('warning', 'Иди домой!');
            return back()->with('warning', 'НЕТ ДОСТУПА!');
    }
        return $next($request);
    }
}
