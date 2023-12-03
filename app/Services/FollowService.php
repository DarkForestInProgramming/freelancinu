<?php

namespace App\Services;

use App\Models\User;
use App\Models\Follow;

class FollowService
{
    public function followUser(User $user): array
    {
        $currentUser = auth()->user();

        if ($user->id == $currentUser->id) {
            return ['error' => 'Jūs negalite sekti pačio savęs.'];
        }

        $existCheck = Follow::where('user_id', $currentUser->id)->where('followeduser', $user->id)->count();

        if ($existCheck) {
            return ['error' => 'Jūs jau sekate šį narį.'];
        }

        $newFollow = new Follow;
        $newFollow->user_id = $currentUser->id;
        $newFollow->followeduser = $user->id;
        $newFollow->save();

        return ['success' => 'Vartotojas sėkmingai sekamas!'];
    }
}