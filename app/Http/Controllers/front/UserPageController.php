<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Follows;
use App\Models\User;
use App\Services\DataService;
use App\Services\MailService;

class UserPageController extends Controller
{
    public function __construct(private DataService $DataService, private MailService $mailService)
    {
    }
    public function index($id)
    {
        $user = User::with('blogs')->findOrFail($id);
        $blogs = Blog::where('user_id', $user->id)->paginate(1);
        if ($user) {
            try {
                $isFollower = Follows::where('follower', auth()->user()->id)->where("follow", $user->id)->exists();
                // dd($user->id);
            } catch (\Exception $e) {
                $isLike = false;
            }
            $followers = Follows::with('followers')->where('follow', $user->id)->paginate(1);

            $follows = Follows::with('follows')->where('follower', $user->id)->paginate(1);
            return view('front.userPage', compact('user', 'isFollower', 'follows', 'followers', 'blogs'));
        } else {
            return redirect()->route('404');
        }
    }


    public function follow($userId)
    {
        $datas = ['follower' => auth()->user()->id, 'follow' => $userId];
        $newRequest = new \Illuminate\Http\Request($datas);
        if ($this->DataService->simple_create(new Follows(), $newRequest)) {
            $this->mailService->sendMail('front.followmess', [
                'name' => auth()->user()->name
            ], "follow", User::findOrFail($userId)->email);
        }
    }


    public function unfollow($userId)
    {
        $like = Follows::where('follower', auth()->user()->id)->where("follow", $userId)->first();
        $this->DataService->simple_delete($like);
    }
}
