<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homePage() {
        return view('pages.home');
    }

    public function registerPage() {
        return view('pages.register');
    }

    public function loginPage() {
        return view('pages.login');
    }

    public function createPostPage() {
        $categories = Category::all();
        return view('pages.create-post', ['categories' => $categories]);
    }

    public function singlePostPage(Post $post) {
        return view('pages.single-post', ['post' => $post]);
    }

    public function getSubcategories($category)
{
    $subcategories = Subcategory::where('category_id', $category)->get();
    return response()->json($subcategories);
}

public function getSubsubcategories($subcategory)
{
    $subsubcategories = Subsubcategory::where('subcategory_id', $subcategory)->get();
    return response()->json($subsubcategories);
}

}
