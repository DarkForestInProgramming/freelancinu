<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Category;
use App\Models\Follow;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function createPostPage() {
        $categories = Category::all();
        return view('pages.create-post', ['categories' => $categories]);
    }

    public function storeNewPost(CreatePostRequest $request)
    {
        {
            $validatedData = $request->validated();
    
            $validatedData['title'] = strip_tags($validatedData['title']);
            $validatedData['body'] = strip_tags($validatedData['body']);
            $validatedData['user_id'] = auth()->id();
            $slug = Str::slug($validatedData['title']);
        
            $postData = [
                'title' => $validatedData['title'],
                'body' => $validatedData['body'],
                'user_id' => $validatedData['user_id'],
                'category_id' => $validatedData['category_id'],
                'subcategory_id' => $validatedData['subcategory_id'] ?? null,
                'subsubcategory_id' => $validatedData['subsubcategory_id'] ?? null,
                'slug' => $slug, 
            ];
        
            $newPost = Post::create($postData);
        
            return redirect("/topic/{$newPost->slug}")->with('success', 'Naujas įrašas sėkmingai sukurtas!');

        }
    }

    public function singlePostPage(Post $post) {
        $currentlyFollowing = 0;
        if (auth()->check()) {
            $currentlyFollowing = Follow::where([['user_id', '=', auth()->user()->id], ['followeduser', '=', $post->user->id]])->count();
        }
        $post['body'] = strip_tags(Str::markdown($post->body), '<p><ul><ol><li><strong><em><h3><br>');
        return view('pages.single-post', ['post' => $post, 'currentlyFollowing' => $currentlyFollowing]);
    }

    public function deletePost(Post $post) {
        $post->delete();
        return redirect('/profile/' . auth()->user()->slug)->with('success', 'Įrašas sėkmingai pašalintas.');
    }

    public function editPostPage(Post $post) {
        $categories = Category::all();
        return view('pages.edit-post', ['post' => $post, 'categories' => $categories]);
    }

    public function updatePost(Post $post, CreatePostRequest $request) {

        $incomingFields = $request->validated();
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $post->update($incomingFields);

        return back()->with('success', 'Įrašas sėkmingai atnaujintas');
    }

    public function search($term) {
        $posts = Post::search($term)->get();
        $posts->load('user:id,username,avatar');
        return $posts;
    }
}
