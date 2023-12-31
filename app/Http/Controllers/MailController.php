<?php

namespace App\Http\Controllers;

use App\Http\Requests\mail\MailRequest;
use App\Http\Requests\mail\WeeklyRequest;
use App\Models\Mail;
use App\Services\CheckTableService;
use App\Services\DataService;
use App\Services\MailService;
use Exception;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function __construct(private CheckTableService $check, private MailService $mailService, private DataService $dataService)
    {
    }

    public function send(MailRequest $request)
    {
        try {
            $this->mailService->sendMail('front.contactmess', [
                'name' => $request->name,
                'surname' => $request->surname,
                'eemail' => $request->email,
                'mess' => $request->message,
            ], "contact", 'agamedov94@mail.ru');

            return redirect()->route('front.contact')->with('success', 'Your mail sent successfully');
        } catch (Exception $e) {
            return redirect()->route('front.contact')->with('error', 'Error sending message: ' . $e->getMessage());
        }
    }



    public function weekly(WeeklyRequest $request)
    {
        if ($this->check->check(new Mail, 'email', $request->email)->count() > 0) {
            return redirect()->route('front.home')->with('error', 'Sizi email bazanızda artıq mövcuddur');
        };

        if ($this->dataService->simple_create(new Mail(), $request)) {
            return redirect()->route('front.home')->with('success', 'Your mail sent successfully');
        } else {
            return redirect()->route('front.home')->with('error', 'Error');
        }
    }
}
