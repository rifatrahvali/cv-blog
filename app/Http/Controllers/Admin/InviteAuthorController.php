<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InviteAuthorMail;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InviteAuthorController extends Controller
{
    public function create()
    {
        // Davet gönderim formunu görüntüle
        return view('pages.pages-admin.pages_invite.page-invite');
    }

    public function store(Request $request)
    {
        // E-posta doğrulama
        $request->validate([
            'email' => 'required|email|unique:invitations,email',
        ]);

        // Token oluştur
        $token = bin2hex(random_bytes(32));

        // Veritabanına kaydet
        $invitation = Invitation::create([
            'email' => $request->email,
            'token' => $token,
        ]);

        // Mail gönder
        Mail::to($request->email)->send(new InviteAuthorMail($invitation));

        return redirect()->back()->with('success', 'Davet maili başarıyla gönderildi.');
    }
}