<?php

namespace App\Services;

use App\Models\Profile;
use Illuminate\Support\Str;
use App\DTO\UpdateProfileDTO;

final class ProfileService
{
    public function update(
        Profile $profile,
        UpdateProfileDTO $request
    ) {
        $profile->first_name = $request->firstName;
        $profile->last_name = $request->lastName;
        $profile->phone = $request->phone;
        $profile->bio = $request->bio;

        if (null !== $request->avatar) {
            $path = $request->avatar->storeAs(
                sprintf(
                    'uploads/images/avatars/%s',
                    $profile->user->name,
                ),
                sprintf(
                    '%s.%s',
                    Str::uuid()->toString(),
                    $request->avatar->extension()
                ),
                'public'
            );
            $profile->avatar_path = $path;
        }
        return $profile->save();
    }
}
