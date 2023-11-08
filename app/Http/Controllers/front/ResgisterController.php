<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\register\RegisterRequest;
use App\Models\User;
use App\Services\DataService;

class ResgisterController extends Controller
{
    public function __construct(private DataService $DataService)
    {
    }
    public function index()
    {
        return view('front.resgister');
    }

    public function register_add(RegisterRequest $request)
    {
        return $this->DataService->simple_create(new User, $request, 'front.user.login');
    }
}
