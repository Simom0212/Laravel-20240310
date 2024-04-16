<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CanPass
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $user = $request->user()
        // dd($user);
        
        // 變數pass
        $pass = true;
        if (!$pass) {
            // redirect()函式，將你倒到哪裡去，所以我想要導到首頁，如果不通過我就把你導到首頁去
            return redirect('/');
        };

        // 去要去的頁面
        return $next($request);
    }
}
