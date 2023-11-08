<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\login\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('front.login');
    }

    public function login_check(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->route('front.home');
        } else {
            return back()->with('message', 'Login or Passwor is invalid');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('front.user.login');
    }
}
