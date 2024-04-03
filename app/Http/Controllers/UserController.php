<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }
    public function store(
        StoreUserRequest $request,
        UserService $userService
    ) {
        if (!$userService->store($request->getDTO())) {
            return redirect()->back();
        }
        return redirect()->route('ads.index');
    }
    public function login()
    {
        return view('users.login');
    }
    public function authenticate(AuthenticateUserRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            return redirect()->route('ads.index');
        }

        return back()->withErrors([
            'auth' => __('auth.failed')
        ])->onlyInput('name');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('ads.index');
    }
}
