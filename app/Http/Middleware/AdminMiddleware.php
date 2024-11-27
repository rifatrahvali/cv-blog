<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Kullanıcı admin değilse, login sayfasına yönlendirme
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.auth.login');
        }
        // Eğer kullanıcı giriş yaptıysa ve `/admin/login` erişmeye çalışıyorsa
        if ($request->route()->getName() === 'admin.auth.login' && Auth::guard('admin')->check()) {
            return redirect()->route('admin.profile'); // Profil sayfasına yönlendir
        }


        return $next($request);
    }
}

