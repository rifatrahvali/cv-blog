<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;

class InviteAuthorMail extends Mailable
{
    public $invitation;

    public function __construct($invitation)
    {
        $this->invitation = $invitation;
    }

    public function build()
    {
        return $this->subject('Admin Daveti')
                    ->view('pages.pages-emails.pages-invite-author.page-invite-author')
                    ->with(['invitation' => $this->invitation]);
    }
}