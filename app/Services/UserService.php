<?php

namespace App\Services;

use App\DTO\GetUsersDTO;
use App\Models\User;
use App\Enums\UserRole;
use App\DTO\StoreUserDTO;
use Illuminate\Support\Facades\Auth;

final class UserService
{
    public function store(
        StoreUserDTO $request,
        UserRole $role = UserRole::USER
    ): bool {

        $user = new User();
        $user->name = $request->name;
        $user->password = $request->password;
        $user->role = $role;

        if (!$user->save()) {
            return false;
        }

        Auth::login($user);

        return true;
    }

    public function ban(int $id): bool
    {
        $user = User::query()
            ->find($id);
        if (!$user) {
            return false;
        }

        $user->is_banned = true;
        return $user->save();
    }
    public function unBan(int $id): bool
    {
        $user = User::query()
            ->find($id);
        if (!$user) {
            return false;
        }

        $user->is_banned = false;
        return $user->save();
    }
    public function getUsers(GetUsersDTO $request)
    {
        return  User::query()
            ->search($request->search)
            ->orderBy('name');
    }
}
