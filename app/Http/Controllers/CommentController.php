<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function storeComment(CreateCommentRequest $request) {
        $newComment= $request->validated();
        $newComment['body'] = strip_tags($newComment['body']);
        $newComment['user_id'] = auth()->id();
        Comment::create($newComment);
        return back()->with('success', 'Jūsų nuomonė sėkmingai pareikšta.');
    }

    public function deleteComment(Comment $comment) {
        $comment->delete();
        return back()->with('success', 'Jūsų nuomonė sėkmingai pašalinta.');
    }
}
