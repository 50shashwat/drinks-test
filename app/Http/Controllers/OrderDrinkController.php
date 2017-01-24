<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drink;
use App\Table;
use App\Type;
use App\Category;
use App\SubCategory;
use App\Order;
use App\OrderDrink;

class OrderDrinkController extends Controller
{
    public function orderdetail(){
        $orders=Order::all();
        foreach($orders as $order){
            $collection=collect($order);
            $id=$collection->get('id');
            $timeoforder=$collection->get('timeoforder');
            $timeofcompletion=$collection->get('timeofcollection');
            $iscompleted=$collection->get('isCompleted');
            if($iscompleted=='no'){
            $tableid=$collection->get('table_id');
            $table=Table::where('id',$tableid)->first();
            $tableno=$table->number;
            $drinkorders=OrderDrink::where('id',$id)->get();
            foreach($drinkorders as $drinkorder){
                $quantity=$drinkorder->quantity;
                $id=$drinkorder->drink_id;
                $drink=Drink::where('id',$id)->first();
                $name=$drink->name;
                $collectionk[]=collect(['drinkname'=>$name,'quantity'=>$quantity]);
                }
            $collectionp[]=collect(['drinkdetails'=>$collectionk,'orderid'=>$id,'timeofcompletion'=>$timeofcompletion,'timeoforder'=>$timeoforder,'iscompleted'=>$iscompleted,'tableno'=>$tableno]);
            }
            
        }
        return response()->json($collectionp);
        

    	

    }
}
