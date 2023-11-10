<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Follows;
use App\Models\User;
use App\Services\DataService;

class UserPageController extends Controller
{
    public function __construct(private DataService $DataService)
    {
    }
    public function index($id)
    {


        $user = User::findOrFail($id);

        if ($user) {
            try {
                $isFollower = Follows::where('follower', auth()->user()->id)->where("follow", $user->id)->exists();
                // dd($user->id);
            } catch (\Exception $e) {
                $isLike = false;
            }
            return view('front.userPage', compact('user', 'isFollower'));
        } else {
            return redirect()->route('404');
        }
    }


    public function follow($userId)
    {
        $datas = ['follower' => auth()->user()->id, 'follow' => $userId];
        $newRequest = new \Illuminate\Http\Request($datas);
        $this->DataService->simple_create(new Follows(), $newRequest);
    }


    public function unfollow($userId)
    {
        $like = Follows::where('follower', auth()->user()->id)->where("follow", $userId)->first();
        $this->DataService->simple_delete($like);
    }
}
