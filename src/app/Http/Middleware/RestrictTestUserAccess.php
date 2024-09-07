<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestrictTestUserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // 特定のユーザIDを制限
        $restrictedUserName = 'test_user';

        // 現在ログインしているユーザのIDを取得
        if (Auth::check() && Auth::user()->name === $restrictedUserName) {
            // アクセス制限された場合、終始管理アプリのTOPページへ移動
            return redirect('/manegement');
        }

        return $next($request);
    }
}
