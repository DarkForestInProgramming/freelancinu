<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function profilePage(User $user) {
        return view('pages.profile-posts', ['username' => $user->username, 'role' => $user->role, 'avatar' => $user->avatar, 'posts' => $user->posts()->latest()->get(), 'postCount' => $user->posts()->count()]);
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
    }
}
