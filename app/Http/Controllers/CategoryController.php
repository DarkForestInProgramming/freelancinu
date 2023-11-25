<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
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
