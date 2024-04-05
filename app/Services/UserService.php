<?php

namespace App\Services;

use App\DTO\GetUsersDTO;
use App\Models\User;
use App\Enums\UserRole;
use App\DTO\StoreUserDTO;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

final class UserService
{
    public function store(
        StoreUserDTO $request,
        UserRole $role = UserRole::USER
    ): bool {
        DB::transaction(function () use ($request, $role) {

            $user = new User();
            $user->name = $request->name;
            $user->password = $request->password;
            $user->role = $role;
            $user->save();

            $profile = new Profile();
            $profile->user()->associate($user);
            $profile->save();

            Auth::login($user);
            return true;
        });
        return false;
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
            ->orderBy('is_banned')
            ->orderBy('name');
    }
}
