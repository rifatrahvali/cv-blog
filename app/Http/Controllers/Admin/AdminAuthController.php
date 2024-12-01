<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; // Global Controller sınıfını içe aktar

use App\Models\Admin;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function loginForm()
    {
        return view('pages.pages-auth.pages_login.login-page');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Giriş kontrolü
        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            // Rol kontrolü: Kullanıcı admin değilse oturumu kapat ve hata döndür
            if (Auth::guard('admin')->user()->role !== 'admin') {
                Auth::guard('admin')->logout();
                return back()->withErrors(['error' => 'Bu panele erişim yetkiniz yok.']);
            }

            return redirect()->intended(route('admin.index'));
        }

        return back()->withErrors(['error' => 'Giriş başarısız.']);
    }

    public function registerForm(Request $request)
    {
        $token = $request->query('token');
        $invitation = Invitation::where('token', $token)->where('used', false)->first();

        if (!$invitation) {
            return redirect()->route('admin.auth.login')->with('error', 'Geçersiz veya kullanılmış token.');
        }

        return view('pages.pages-auth.pages_register.register-page', compact('token'));
    }

    public function register(Request $request)
    {
        // Gelen tokeni kontrol et
        $token = $request->query('token');

        // Tokenin geçerli olup olmadığını kontrol et
        $invitation = Invitation::where('token', $token)->where('used', false)->first();

        if (!$invitation) {
            return redirect()->route('admin.auth.login')->with('error', 'Geçersiz veya kullanılmış bir token.');
        }

        // Kullanıcı verilerini doğrula
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'username' => 'required|string|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Admin oluştur
        $admin = Admin::create([
            'name' => $validated['name'],
            'surname' => $validated['surname'],
            'email' => $validated['email'],
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
        ]);

        // Tokeni kullanılan duruma getir
        $invitation->update(['used' => true]);

        // Kullanıcıyı giriş yaptır
        Auth::guard('admin')->login($admin);

        return redirect()->route('admin.index')->with('success', 'Kayıt başarılı.');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.auth.login');
    }
}