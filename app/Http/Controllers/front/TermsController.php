<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;

class TermsController extends Controller
{
    public function index()
    {
        return view('front.terms', ['terms_of_use' => trans('terms.terms_of_use')]);
    }
}
