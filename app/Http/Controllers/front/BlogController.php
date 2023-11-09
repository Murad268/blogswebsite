<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Categories;

class BlogController extends Controller
{
    public function index()
    {
        return view('front.blog');
    }


    public function blogs() {
        $blogs = Blog::orderByDesc('created_at')->paginate(3);
        $cetegories = Categories::all();
        return view('front.blogs', compact('blogs', 'cetegories'));
    }
}
