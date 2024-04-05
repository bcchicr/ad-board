<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\Profile;
use App\Services\ProfileService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit(Profile $profile)
    {
        return view('profiles.edit', compact('profile'));
    }
    public function update(
        UpdateProfileRequest $request,
        ProfileService $profileService,
        Profile $profile
    ) {
        if (!$profileService->update($profile, $request->getDTO())) {
            return redirect()->back();
        }
        return redirect()->route('users.show', $profile->user_id);
    }
}
