<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class MailService
{
    public function __construct()
    {
    }

    public function sendMail($page, $datas, $subject, $email)
    {
        Mail::send(
            $page,
            $datas,
            function ($message) use ($subject, $email) {
                $message->to($email)->subject($subject);
            }
        );
    }
}
