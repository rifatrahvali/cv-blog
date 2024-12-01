<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InviteAuthorMail;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminInviteController extends Controller
{
    public function create()
    {
        return view('pages.pages-admin.pages_invite.page-invite');
    }

    public function store(Request $request)
    {
        $request->validate(['email' => 'required|email|unique:invitations,email']);

        $invitation = Invitation::create([
            'email' => $request->email,
            'token' => Str::random(32),
        ]);

        Mail::to($request->email)->send(new InviteAuthorMail($invitation));

        return redirect()->back()->with('success', 'Davet maili gönderildi.');
    }
}