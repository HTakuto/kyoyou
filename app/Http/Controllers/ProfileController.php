<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Auth::user()->profile;

        if(!$profile) {
            $profile = new Profile();
            $profile->user_id = Auth::id();
            $profile->save();
        }

        return view('profiles.edit', compact('profile'));
    }

    public function update(ProfileRequest $request, Profile $profile)
    {
        $user = Auth::user();
        $profile = $user->profile;

        $profile->fill($request->all())->save();

        if ($request->hasFile('user_image')) {
            $user_image = $request->file('user_image');
            $filename = time() . '_' . $user_image->getClientOriginalName();
            $path = $user_image->storeAs('public/images', $filename);
            $profile->user_image = $filename;
            $profile->save();
        }

        return redirect()->route('users.show', ['name' => $user->name]);
    }
}
