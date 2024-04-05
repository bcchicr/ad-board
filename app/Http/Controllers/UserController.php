<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AuthenticateUserRequest;

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
    public function show(User $user)
    {
        // $user = Auth::user();
        return view('users.show', compact('user'));
    }

    public function ban(
        string $id,
        UserService $userService
    ) {
        if (!$userService->ban($id)) {
            return redirect()->back()->withErrors([
                'controls' => 'Не удалось забанить пользователя'
            ]);
        }
        return redirect()->route('users.show', $id);
    }

    public function unBan(
        string $id,
        UserService $userService
    ) {
        if (!$userService->unBan($id)) {
            return redirect()->back()->withErrors([
                'controls' => 'Не удалось разбанить пользователя'
            ]);
        }
        return redirect()->route('users.show', $id);
    }
}
