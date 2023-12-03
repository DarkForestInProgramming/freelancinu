<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\ProfileService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function profilePage(User $user) {
        $this->profileService->getSharedData($user);

        return view('pages.profile-posts', ['posts' => $user->posts()->latest()->paginate(5)]);
    }

    public function avatarPage() {
        return view('pages.change-avatar');
    }

    public function changeAvatar(Request $req)
    {
        $user = auth()->user();
        $user = $this->profileService->changeAvatar($user, $req);

        return back()->with('success', 'Profilio nuotrauka pakeista! Dabar galite pasirodyti sukurdami naują įrašą.');
    }

    public function profileFollowers(User $user) {
        $this->profileService->getSharedData($user);

        return view('pages.profile-followers', ['followers' => $user->followers()->latest()->paginate(5)]);
    }

    public function profileFollowing(User $user) {
        $this->profileService->getSharedData($user);

        return view('pages.profile-following', ['following' => $user->followingTheseUsers()->latest()->paginate(5)]);
    }
}
