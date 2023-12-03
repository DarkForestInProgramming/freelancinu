<?php

namespace App\Services;
use App\Models\Comment;
class CommentService
{
    public function createComment(array $commentData): void
    {
        $commentData['body'] = strip_tags($commentData['body']);
        $commentData['user_id'] = auth()->id();
        Comment::create($commentData);
    }
}