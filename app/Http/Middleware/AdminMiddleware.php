<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Kullanıcı admin giriş yapmamışsa login sayfasına yönlendirme
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.auth.login');
        }

        // Kullanıcı admin değilse 403 hatası döndür
        if (Auth::guard('admin')->user()->role !== 'admin') {
            abort(403, 'Sayfa Bulunamadı.');
        }

        // Eğer kullanıcı giriş yaptıysa ve `/admin/login` sayfasına erişmeye çalışıyorsa
        if ($request->route()->getName() === 'admin.auth.login' && Auth::guard('admin')->check()) {
            return redirect()->route('admin.index'); // Ana sayfaya yönlendir
        }
        // Kullanıcının oturum anahtarını kontrol et
        if (session('forced_logout')) {
            // Kullanıcı oturumunu kapat ve login sayfasına yönlendir
            Auth::guard('admin')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            return redirect()->route('admin.auth.login')->with('error', 'Oturumunuz sonlandırıldı.');
        }

        return $next($request);
    }
}