<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use View;

use App\Drink;
use App\Table;
use App\Order;
use App\OrderDrink;

class WebsiteController extends Controller
{
   //Show login form
   public function showLogin(){
	   	if (Session::get('token','default')!='default') {
	   		echo "session set";
	   		die();
	   		return redirect()->action('WebsiteController@dashboard');
	   	}
   		return view('login');
   }

   //handling post request
   public function postLogin(Request $request){
   		if ($request->email=="admin@kalpvaig.com" && $request->password=="admin123"){
   				Session::put('token', 'usertoken');
   				return redirect()->action('WebsiteController@dashboard');
   			}
   			$error="failed";
   		return view('login',compact('error'));
   		
   }

   //dashboard-- Angular View
   public function dashboard(){
		if (Session::get('token','default')=='default') {
			return redirect()->action('WebsiteController@showLogin');
		}
		return View::make('dashboard');
   }

   public function history(){
        return View::make('order');
   }


}
