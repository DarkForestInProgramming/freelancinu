<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;
use App\Models\Follow;
class PostService
{
    public function calculateCurrentlyFollowing(Post $post)
    {
        $currentlyFollowing = 0;
        $user = auth()->user();
        if (auth()->check() && $user) {
            $currentlyFollowing = Follow::where([
                ['user_id', '=', $user->id],
                ['followeduser', '=', $post->user->id]
            ])->count();
        }
        return $currentlyFollowing;
    }

    public function getCurrentUserComment(Post $post, User $user)
    {
        $currentUserComment = null;
        if ($user) {
            $currentUserComment = $post->comments->first(function ($comment) use ($user) {
                return $comment->user_id === $user->id;
            });
        }
        return $currentUserComment;
    }

    public function updatePost(Post $post, array $incomingFields)
    {
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $post->update($incomingFields);
        return $post;
    }
}