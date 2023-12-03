<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;
use App\Services\CommentService;

class CommentController extends Controller
{
    public function storeComment(CreateCommentRequest $req, CommentService $commentService) {
        $newComment = $req->validated();
        $commentService->createComment($newComment);

        return back()->with('success', 'Jūsų nuomonė sėkmingai pareikšta.');
    }

    public function deleteComment(Comment $comment) {
        $comment->delete();
        
        return back()->with('success', 'Jūsų nuomonė sėkmingai pašalinta.');
    }
}
