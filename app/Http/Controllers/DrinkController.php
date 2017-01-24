<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Drink;
use App\Type;
Use App\Category;
use App\SubCategory;



class DrinkController extends Controller
{
    public function showdrink(Request $request){
    	$drinks= Drink::all();
    	
        $collection = array();

    	foreach($drinks as $drink){
    		$drinkname=$drink->name;
    		$drinkseriesno=$drink->seriesno;
    		$drinkimgurl=$drink->imgurl;
    		$drinktypeid=$drink->type_id;
    		$drinkcategoryid=$drink->category_id;
    		$drinksubcategoryid=$drink->subcategory_id;
    	}
          
        return response()->json(
                $drinks
            ,200);
    
    }
    

    public function showdetails(Request $request){
        $drinkname=$request->input('name');
        $drinkid=Drink::where('name',$drinkname)->first();
        $drinkseriesno=$drinkid->seriesno;
        $drinkimgurl=$drinkid->imgurl;
        $drinktypeid=$drinkid->type_id;
        $drinkcategoryid=$drinkid->category_id;
        $drinksubcategoryid=$drinkid->subcategory_id;
        $drinktype=Type::where('id',$drinktypeid)->first();
        $drinktypename=$drinktype->name;
        $drinkcategory=Category::where('id',$drinkcategoryid)->first();
        $drinkcategoryname=$drinkcategory->name;
        $drinksubcategory=SubCategory::where('id',$drinksubcategoryid)->first();
        $drinksubcategoryname=$drinkcategory->name;

        $collection=collect(['drinkname'=>$drinkname,'seriesno'=>$drinkseriesno,'imgurl'=>$drinkimgurl,'type'=>$drinktypename,'category'=>$drinkcategoryname,'subcategory'=>$drinksubcategoryname]);

        return response()->json($collection);
    }

}
