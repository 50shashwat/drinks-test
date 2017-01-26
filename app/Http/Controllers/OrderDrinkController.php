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
        $orders=Order::where('isCompleted',0)->orderBy('id','asc')->get();
        $collectionp= array();
        foreach($orders as $order){           
            $orderid=$order->id;
            $timeoforder=$order->timeoforder;

            $tableno=Table::find($order->table_id)->number;
            $drinkorders=OrderDrink::where('order_id',$orderid)->get();
            
            $collectionk=array();
            foreach($drinkorders as $drinkorder){
                $quantity=$drinkorder->quantity;
                $drinkname=Drink::find($drinkorder->drink_id)->name;
                $collectionk[]=collect(['drinkname'=>$drinkname,'quantity'=>$quantity]);
            }
            if(count($drinkorders)>0){
                $collectionp[]=collect([
                    'drinkdetails'=>$collectionk,
                    'orderid'=>$orderid,
                    'timeoforder'=>$timeoforder,
                    'tableno'=>$tableno]);
            }
           
            
        }
        return response()->json($collectionp);
        
    }
}
