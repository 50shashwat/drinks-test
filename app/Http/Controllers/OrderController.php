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
        $orderid=$request->orderid;
        $order=Order::find($orderid);
        $order->timeofcompletion = Carbon\Carbon::now();
        $order->isCompleted=1;
        $order->save();
        return response()->json([
            'data'=>'success'
        ]);
    }


    public function history($id){

    	$orderNum = count(Order::where('isCompleted',1)->get());
    	$id*=5;
      	$orders = Order::where('isCompleted',1)->orderBy('id','desc')->skip($id)->take(5)->get();

        $collectionp= array();
        foreach($orders as $order){           
            $orderid=$order->id;
            $timeofcompletion=$order->timeofcompletion;

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
                    'timeofcompletion'=>$timeofcompletion,
                    'tableno'=>$tableno]);
            }
           
            
        }

        return response()->json([
        		'totalorders'=>$orderNum,
        		'data'=>$collectionp
        	],200);

    }

}
