<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Follow;
use Illuminate\Support\Facades\View;
class ProfileService
{
    public function getSharedData($user)
    {
        $currentlyFollowing = 0;
        if (auth()->check()) {
            $currentlyFollowing = Follow::where([
                ['user_id', '=', auth()->user()->id],
                ['followeduser', '=', $user->id]
            ])->count();
        }

        View::share('sharedData', [
            'currentlyFollowing' => $currentlyFollowing,
            'username' => $user->username,
            'slug' => $user->slug,
            'role' => $user->role,
            'avatar' => $user->avatar,
            'postCount' => $user->posts()->count(),
            'followerCount' => $user->followers()->count(),
            'followingCount' => $user->followingTheseUsers()->count()
        ]);
    }

    public function changeAvatar($user, $avatar)
    {
        $avatar->validate([
            'avatar' => 'required|image|max:3000'
        ]);

        $filename = $user->id . '-' . uniqid() . '.webp';
        $imgData = Image::make($avatar->file('avatar'))->fit(120)->encode('webp');
        Storage::put('public/avatars/' . $filename, $imgData);

        $oldAvatar = $user->avatar;
        $user->avatar = $filename;
        $user->save();

        if ($oldAvatar !== "https://res.cloudinary.com/dp0m5mp1s/image/upload/v1700924315/Freelancinu/default_avataar.png") {
            Storage::delete(str_replace("/storage/", "public/", $oldAvatar));
        }

        return $user;
    }
}