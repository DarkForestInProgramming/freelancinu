<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function createFollow(User $user) {
        // you cannot follow yourself
        if ($user->id == auth()->user()->id) {
            return back()->with('error', 'Jūs negalite sekti pačio savęs.');
        }
        // you cannot follow someone you're already following
        $existCheck = Follow::where([['user_id', '=', auth()->user()->id], ['followeduser', '=', $user->id]])->count();
        if($existCheck) {
            return back()->with('error', 'Jūs jau sekate šį narį.');
        }
        $newFollow = new Follow;
        $newFollow->user_id = auth()->user()->id;
        $newFollow->followeduser = $user->id;
        $newFollow->save();

        return back()->with('success', 'Vartotojas sėkmingai sekamas!');
    }

    public function removeFollow(User $user) {
        Follow::where([['user_id', '=', auth()->user()->id], ['followeduser', '=', $user->id]])->delete();
        return back()->with('success', 'Vartotojas sėkmingai nebesekamas.');
    }
}