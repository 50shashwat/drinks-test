<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Table;


class TableController extends Controller
{
    public function registertable(Request  $request){
    	$tableno=$request->input('tableno');
    	$token='android'.rand(1,999999).'table';
    	$table=new Table;
    	$table->number=$tableno;
    	$table->token=$token;
    	$table->save();
    	return response()->json([
    		"token"=>$token
    		],200);

    }
}
