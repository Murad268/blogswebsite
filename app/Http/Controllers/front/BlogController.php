<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Categories;
use App\Models\Likes;
use App\Services\DataService;

class BlogController extends Controller
{
    public function __construct(private DataService $DataService)
    {
    }
    public function index($slug)
    {
        $blog = Blog::where('slug', $slug)->first();

        if ($blog) {
            try {
                $isLike = Likes::where('user_id', auth()->user()->id)->where("blog_id", $blog->id)->exists();
            } catch (\Exception $e) {
                $isLike = false;
            }

            $count = Likes::where("blog_id", $blog->id)->count();
            return view('front.blog', compact('blog', 'isLike', 'count'));
        } else {
            return redirect()->route('404');
        }
    }



    public function blogs($slug = null)
    {
        if (!$slug) {
            $blogs = Blog::orderByDesc('created_at')->paginate(2);
        } else {
            $foundCategory = Categories::where('slug', $slug)->first();
            $blogs = Blog::where('category_id', $foundCategory->id)->paginate(2);
        }
        $cetegories = Categories::all();
        return view('front.blogs', compact('blogs', 'cetegories'));
    }


    public function like($id)
    {
        $data = ['user_id' => auth()->user()->id, 'blog_id' => $id];
        $newRequest = new \Illuminate\Http\Request($data);
        // return response($id);
        return $this->DataService->simple_create(new Likes(), $newRequest, 'front.user');
    }


    public function dislike($id)
    {
        $like = Likes::where('user_id', auth()->user()->id)->where("blog_id", $id)->first();
        return $this->DataService->simple_delete($like, 'front.user');
    }
}
