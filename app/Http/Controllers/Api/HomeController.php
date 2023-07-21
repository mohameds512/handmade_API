<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function allData(){
        $data = (object)[];
        $categories = Category::get();
        $data->categories = $categories;
        return \success(['data'=>$data]); 
        // return \response(['data'=>$data]);
    }
}
