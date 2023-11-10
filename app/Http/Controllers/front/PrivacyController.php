<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;

class PrivacyController extends Controller
{
    public function index()
    {
        return view('front.privacy', ['privacy' => trans('privacy.privacy')]);
    }
}
