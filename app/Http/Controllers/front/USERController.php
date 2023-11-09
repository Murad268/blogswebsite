<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\UpdatePasswordRequest;
use App\Http\Requests\user\UpdateProfileRequest;
use App\Models\User;
use App\Services\DataService;
use Illuminate\Support\Facades\Auth;

class USERController extends Controller
{
    public function __construct(private DataService $DataService)
    {
    }
    public function index()
    {
        return view('front.USER');
    }

    public function edit_user()
    {
        return view('front.edit_user');
    }


    public function update_user(UpdateProfileRequest $request)
    {
        $user_id = auth()->user()->id;
        $model = User::findOrFail($user_id);
        $images = ['avatar' => $request->avatar];
        if($this->DataService->simple_update_withImage($model, $request, $images, 'users')){
            return redirect()->route('front.user');
        };
    }


    public function edit_pass()
    {
        return view('front.edit_pass');
    }

    public function update_pass(UpdatePasswordRequest $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        Auth::logout();
        if($this->DataService->simple_update($user, $request)){
            return redirect()->route('front.user');
        };
    }
}
