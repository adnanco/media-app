<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $token = $this->userService->getAccessToken(Auth::id(), 'Token');
        return view('pages.dashboard', ['accessToken' => $token]);
    }
}
