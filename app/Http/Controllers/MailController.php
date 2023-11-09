<?php

namespace App\Http\Controllers;

use App\Services\MailService;
use Exception;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function __construct(private MailService $mailService)
    {
    }

    public function send(Request $request)
    {
        try {
            $this->mailService->sendMail('front.contactmess', [
                'name' => $request->name,
                'surname' => $request->surname,
                'eemail' => $request->email,
                'mess' => $request->mess,
            ], "contact", 'agamedov94@mail.ru');

            return redirect()->route('front.contact')->with('success', 'Your mail sent successfully');
        } catch (Exception $e) {
            return redirect()->route('front.contact')->with('error', 'Error sending message: ' . $e->getMessage());
        }
    }
}
