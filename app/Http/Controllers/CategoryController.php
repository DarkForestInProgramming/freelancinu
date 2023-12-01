<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subsubcategory;

class CategoryController extends Controller
{
    public function getCategories() {
        $categories = Category::all();
        return view('pages.home', ['categories' => $categories]);
    }

    public function showCategory(Category $category) {
        return view ('pages.category-posts', ["category" => $category]);
    }

    public function showSubcategory(Subcategory $subcategory) {
        return view ('pages.subcategory-posts', ["subcategory" => $subcategory]);
    }

    public function showSubsubcategory(Subsubcategory $subsubcategory) {
        return view ('pages.subsubcategory-posts', ["subsubcategory" => $subsubcategory]);
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
