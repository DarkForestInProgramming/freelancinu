<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use App\Services\FollowService;

class FollowController extends Controller
{
    public function createFollow(User $user, FollowService $followService)
    {
        $result = $followService->followUser($user);

        if (isset($result['error'])) {
            return back()->with('error', $result['error']);
        }

        return back()->with('success', $result['success']);
    }

    public function removeFollow(User $user) {
        Follow::where([['user_id', '=', auth()->user()->id], ['followeduser', '=', $user->id]])->delete();
        
        return back()->with('success', 'Vartotojas sėkmingai nebesekamas.');
    }
}
