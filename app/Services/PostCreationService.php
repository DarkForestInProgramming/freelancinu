<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Str;

class PostCreationService
{
    public function createNewPost(array $validatedData)
    {
        $validatedData['title'] = strip_tags($validatedData['title']);
        $validatedData['body'] = strip_tags($validatedData['body']);
        $validatedData['user_id'] = auth()->id();
        $slug = Str::slug($validatedData['title']);

        $postData = [
            'title' => strip_tags($validatedData['title']),
            'body' => strip_tags($validatedData['body']),
            'user_id' => auth()->id(),
            'category_id' => $validatedData['category_id'],
            'subcategory_id' => $validatedData['subcategory_id'] ?? null,
            'subsubcategory_id' => $validatedData['subsubcategory_id'] ?? null,
            'slug' => $slug,
        ];

        return Post::create($postData);
    }
}