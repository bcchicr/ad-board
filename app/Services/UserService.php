<?php

namespace App\Services;

use App\Models\Role;
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
}
