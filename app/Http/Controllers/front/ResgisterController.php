<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResgisterController extends Controller
{
    public function index()
    {
        return view('front.resgister');
    }
}