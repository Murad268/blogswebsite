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


    public function blogs($slug = null) {
        if(!$slug) {
            $blogs = Blog::orderByDesc('created_at')->paginate(2);
        } else {
            $foundCategory = Categories::where('slug', $slug)->first();
            $blogs = Blog::where('category_id', $foundCategory->id)->paginate(2);
        }
        $cetegories = Categories::all();
        return view('front.blogs', compact('blogs', 'cetegories'));
    }
}
