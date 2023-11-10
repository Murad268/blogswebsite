<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\comments\AddCommentRequest;
use App\Models\Blog;
use App\Models\Categories;
use App\Models\Comments;
use App\Models\Likes;
use App\Services\DataService;
use App\Services\MailService;
use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{
    public function __construct(private DataService $DataService, private MailService $mailService)
    {
    }
    public function index($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $comments = Comments::where('blog_id', $blog->id)->paginate(5);
        if ($blog) {
            try {
                $isLike = Likes::where('user_id', auth()->user()->id)->where("blog_id", $blog->id)->exists();
            } catch (\Exception $e) {
                $isLike = false;
            }

            $count = Likes::where("blog_id", $blog->id)->count();
            return view('front.blog', compact('blog', 'isLike', 'count', 'comments'));
        } else {
            return redirect()->route('404');
        }
    }



    public function blogs($slug = null)
    {

        if (!$slug) {
            $blogs = Blog::orderByDesc('created_at')->paginate(10);
        } else {
            $foundCategory = Categories::where('slug', $slug)->first();
            if ($foundCategory) {
                $blogs = Blog::where('category_id', $foundCategory->id)->paginate(10);
            } else {
                $blogs = Blog::orderByDesc('created_at')->paginate(10);
            }
        }
        $cetegories = Categories::all();
        return view('front.blogs', compact('blogs', 'cetegories'));
    }


    public function like($id)
    {
        $data = ['user_id' => auth()->user()->id, 'blog_id' => $id];
        $newRequest = new \Illuminate\Http\Request($data);
        // return response($id);
        $this->DataService->simple_create(new Likes(), $newRequest);
    }


    public function dislike($id)
    {
        $like = Likes::where('user_id', auth()->user()->id)->where("blog_id", $id)->first();
        $this->DataService->simple_delete($like);
    }


    public function comment(AddCommentRequest $request, $id)
    {

        $blog = Blog::find($id);
        $email = $blog->user->email;
        $name = $blog->user->name;

        $data = ['user_id' => auth()->user()->id, 'comment' => $request->comment, 'blog_id' => $id];
        $newRequest = new \Illuminate\Http\Request($data);

        if ($this->DataService->simple_create(new Comments(), $newRequest)) {
            if (auth()->user()->email != $email) {
                $this->mailService->sendMail('front.mail', [
                    'blog' => $blog->title,
                    'name' => $name
                ], "comment added", $email);
            }
            return redirect()->route('front.blog', $blog->slug);
        } else {
            return false;;
        }
    }


    public function comment_delete($id)
    {
        $comment = Comments::find($id);
        $blog = Blog::find($comment->blog_id);
        if ($this->DataService->simple_delete($comment)) {
            return redirect()->route('front.blog', $blog->slug);
        };
    }




    public function search(Request $request)
    {
        $q = $request->q;

        $blogs = Blog::where('title', 'like', "%$q%")->paginate(10);
        return view('front.search', compact('blogs'));
    }
}
