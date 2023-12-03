<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Services\PostCreationService;
use App\Services\PostService;
use Illuminate\Support\Str;

class PostController extends Controller
{
    protected $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function createPostPage() {
        $categories = Category::all();

        return view('pages.create-post', ['categories' => $categories]);
    }

    public function storeNewPost(CreatePostRequest $req, PostCreationService $postService)
    {
        $newPost = $postService->createNewPost($req->validated());

        return redirect("/topic/{$newPost->slug}")->with('success', 'Naujas įrašas sėkmingai sukurtas!');
    }

    public function singlePostPage(Post $post)
    {
        $currentlyFollowing = $this->postService->calculateCurrentlyFollowing($post);
        $commentsCount = $post->comments()->count();
        $user = auth()->user();
        $post['body'] = strip_tags(Str::markdown($post->body), '<p><ul><ol><li><strong><em><h3><br>');
        $currentUserComment = $this->postService->getCurrentUserComment($post, $user);
        
        return view('pages.single-post', [
            'post' => $post,
            'currentlyFollowing' => $currentlyFollowing,
            'currentUserComment' => $currentUserComment,
            'commentsCount' => $commentsCount,
        ]);
    }

    public function deletePost(Post $post) {
        $post->delete();

        return redirect('/profile/' . auth()->user()->slug)->with('success', 'Įrašas sėkmingai pašalintas.');
    }

    public function editPostPage(Post $post) {
        $categories = Category::all();

        return view('pages.edit-post', ['post' => $post, 'categories' => $categories]);
    }

    public function updatePost(Post $post, CreatePostRequest $req)
    {
        $incomingFields = $req->validated();
        $updatedPost = $this->postService->updatePost($post, $incomingFields);

        return back()->with('success', 'Įrašas sėkmingai atnaujintas');
    }

    public function search($term) {
        $posts = Post::search($term)->get();
        $posts->load('user:id,username,avatar');

        return $posts;
    }
}
