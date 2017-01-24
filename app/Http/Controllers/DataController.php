<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    //
    public function categories(){
    	return response()->json([
    			\App\Category::all()
    		],
    		200);
    }

    public function subcategories(){
    	return response()->json([
    			\App\SubCategory::all()
    		],
    		200);
    }

    public function types(){
    	return response()->json([
    			\App\Type::all()
    		],
    		200);
    }
}
