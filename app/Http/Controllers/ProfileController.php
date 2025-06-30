<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\UpdateRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        /** @var User $user */
        $user = Auth::user();

        $profile = $user->profile;
        return view('profile', [
            'profile' => $profile,
        ]);
    }

    public function update(UpdateRequest $request)
    {
        /** @var User profile */
        $user = Auth::user();

        $profile = $user->profile;
        $profile->fill($request->validated());

        if($request->picture)
        {
            $profile->picture = $request->picture->store('pictures', 'public');
        }

        $profile->save();

        return back()->with('message', 'Profile updated successfully.');
    }
}
