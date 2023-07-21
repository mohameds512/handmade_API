<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::get()->transform(function($item){
            $item->img_route = route('category_image', ['img' => $item->image, 'no_cache' => Str::random(4)]);
            return $item;
        });
        return \response(['categories'=>$categories]);
    }

    public function storeCategory(Request $request,Category $category){
        if(!$category){
            $category = new Category();
        }
        if ($request->hasFile('image')) {
            $file_image = $request->file('image');
            $image =Str::random(6);
            saveRequestFile($file_image, "$image", "categories");
        }
        
        $category->fill($request->all());
        $category->image = $image;
        $category->save();
        return response()->json(['message' => "success"], 201);
    }

    public function categoriesImages(Request $request, $img, $no_cache)
    {

        $paths = findFiles("categories", "$img");

        if (isset($paths[0]) && $paths[0]) {
            return responseFile($paths[0], "$img");
        }
        return response(['message' => 'not found'], 404);

    }

}
