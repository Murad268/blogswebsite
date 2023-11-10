<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserPageController extends Controller
{
    public function index($id)
    {
        $user = User::findOrFail($id);

        return view('front.userPage', compact('user'));
    }
}
