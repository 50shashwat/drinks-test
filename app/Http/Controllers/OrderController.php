<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Table;
use App\Order;
use App\Orderdrink;
use App\Drink;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function takeorder(Request $request){

        $table = Table::where('token',$request->token)->first();
        
        if($table==null){
            return response()->json('failed');
    	}
    	else{
    		$order=new Order;
    		$order->table_id=$table->id;
    		$order->timeoforder=Carbon::now();
    		$order->isCompleted='no';
    		$order->save();

            foreach($request->get('drinks') as $drink){
                 $drink = collect($drink);
                $orderdrink=new OrderDrink;
                $orderdrink->order_id=$order->id;
                $orderdrink->drink_id=$drink->get('id');
                $orderdrink->quantity=$drink->get('quantity');
                $orderdrink->save();
            }
            return response()->json([
                    'ordernumber'=>$order->id
                ],200);
        }
    }

    public function completeorder(Request $request){
            $orderid=$request->input('id');
            $order=Order::where('id',$orderid)->first();
            $order->isCompleted=$request->input('iscompleted');
            $order->save();
            return response()->json('orderdone');
    }
}
