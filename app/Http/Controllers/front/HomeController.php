<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Blog as ModelsBlog;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = ModelsBlog::with('user')->orderBy('created_at', 'desc')->take(10)->get();
        $blog = ModelsBlog::inRandomOrder()->first();

        return view('front.home', compact('blogs', 'blog'));
    }
}
