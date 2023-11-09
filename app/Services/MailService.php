<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class MailService
{
    public function __construct()
    {
    }

    public function sendMail($datas, $subject, $email)
    {
        Mail::send(
            'front.mail',
            $datas,
            function ($message) use ($subject, $email) {
                $message->to($email)->subject($subject);
            }
        );
    }
}
