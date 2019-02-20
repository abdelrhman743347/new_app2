<?php

namespace App\Http\Controllers\Dashboard;

// use Auth;
use Session;
use App\product;
use App\Category;
use App\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use App\Order;

class UserOrderController extends Controller
{
    // public function index()
    // {
    // 	$orders = Order::all();
    // 	// foreach ($orders as $order ) {
	   //  // 	dd($order->cart);
    		
    // 	// }
    // 	return view('dashboard.orders.index',compact('orders'));
    // }

    public function getAllUserOrder()
    {
    	// $orders =Auth::user()->orders;
    	$orders =Order::all();
    	$orders->transform(function($order, $key){
    		$order->cart =unserialize($order->cart);
    		return $order;
    	});

    	return view('dashboard.orders.index', compact('orders'));


    }    

    public function getUserOrder()
    {
    	$orders =Auth::user()->orders;
    	$orders->transform(function($order, $key){
    		$order->cart =unserialize($order->cart);
    		return $order;
    	});

    	return view('dashboard.orders.userIndex', compact('orders'));


    }

    public function destroy(Order $order)
    {

       $order->delete();
        session()->flash('success', __('order Deleted Successfully'));
        return back();

    }
}
