<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::get();
        return \response(['categories'=>$categories]);
    }

    public function storeCategory(Request $request,Category $category){
        if(!$category){
            $category = new Category();
        }
        $category->fill($request->all());
        $category->save();
        return response()->json(['message' => "success"], 201);
    }

}
