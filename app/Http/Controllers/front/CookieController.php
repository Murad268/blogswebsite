<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;

class CookieController extends Controller
{
    public function index()
    {
        return view('front.cookie', ['cookie' => trans('cookie.cookie')]);
    }
}
