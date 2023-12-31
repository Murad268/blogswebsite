<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\writeblogs\WriteBlogsRequest;
use App\Models\User;
use App\Models\Blog;
use App\Models\Categories;
use App\Services\DataService;
use Illuminate\Support\Str;

class WriteController extends Controller
{
    public function __construct(private DataService $DataService)
    {
    }
    public function index()
    {
        $categories = Categories::all();
        return view('front.write', compact('categories'));
    }

    public function write_block(WriteBlogsRequest $request)
    {
        $user_id = auth()->user()->id;
        $images = ['image' => $request->image, 'banner' => $request->banner];
        $customRequest = $request->merge(['user_id' => $user_id,'slug' => Str::slug($request->title)]);
        if($this->DataService->simple_create_withImage(new Blog(), $customRequest, $images, 'blogs')){
            return redirect()->route('front.blogs');
        };
    }
}
