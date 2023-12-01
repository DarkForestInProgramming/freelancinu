<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function getSharedData($user) {
        $currentlyFollowing = 0;
        if (auth()->check()) {
            $currentlyFollowing = Follow::where([['user_id', '=', auth()->user()->id], ['followeduser', '=', $user->id]])->count();
        }
        View::share('sharedData', ['currentlyFollowing' => $currentlyFollowing, 'username' => $user->username, 'slug' => $user->slug, 'role' => $user->role, 'avatar' => $user->avatar, 'postCount' => $user->posts()->count(), 'followerCount' => $user->followers()->count(), 'followingCount' => $user->followingTheseUsers()->count()]);
    }
    public function profilePage(User $user) {
        $this->getSharedData($user);
        return view('pages.profile-posts', ['posts' => $user->posts()->latest()->paginate(5)]);
    }

    public function avatarPage() {
        return view('pages.change-avatar');
    }

    public function changeAvatar(Request $req) {
    $req->validate([
        'avatar' => 'required|image|max:3000'
    ]);
    $user = auth()->user();
    $filename = $user->id . '-' . uniqid() . '.webp';
    $imgData = Image::make($req->file('avatar'))->fit(120)->encode('webp');
    Storage::put('public/avatars/' . $filename, $imgData);
    $oldAvatar = $user->avatar;
    $user->avatar = $filename;
    $user->save();
    if($oldAvatar != "https://res.cloudinary.com/dp0m5mp1s/image/upload/v1700924315/Freelancinu/default_avataar.png") {
        Storage::delete(str_replace("/storage/", "public/", $oldAvatar));
        return back()->with('success', 'Profilio nuotrauka pakeista! Dabar galite pasirodyti sukurdami naują įrašą.');
    }
    return back()->with('success', 'Profilio nuotrauka pakeista! Dabar galite pasirodyti sukurdami naują įrašą.');
    }
    public function profileFollowers(User $user) {
        $this->getSharedData($user);
        return view('pages.profile-followers', ['followers' => $user->followers()->latest()->paginate(5)]);
    }

    public function profileFollowing(User $user) {
        $this->getSharedData($user);
        return view('pages.profile-following', ['following' => $user->followingTheseUsers()->latest()->paginate(5)]);
    }
}
