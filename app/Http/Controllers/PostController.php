<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function storeNewPost(CreatePostRequest $request)
    {
        $validatedData = $request->validated();
    
        $validatedData['title'] = strip_tags($validatedData['title']);
        $validatedData['body'] = strip_tags($validatedData['body']);
        $validatedData['user_id'] = auth()->id();
    
        $postData = [
            'title' => $validatedData['title'],
            'body' => $validatedData['body'],
            'category_id' => $validatedData['category_id'],
            'user_id' => $validatedData['user_id'],
        ];
    
        if ($request->has('subcategory_id')) {
            $postData['subcategory_id'] = $validatedData['subcategory_id'];
        }
    
        if ($request->has('subsubcategory_id')) {
            $postData['subsubcategory_id'] = $validatedData['subsubcategory_id'];
        }
    
        $newPost = Post::create($postData);
    
        return redirect("/post/{$newPost->id}")->with('success', 'Naujas įrašas sėkmingai sukurtas!');
    }
}
