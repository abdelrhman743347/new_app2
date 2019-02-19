<?php

namespace App\Http\Controllers\Dashboard;

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
    public function index()
    {
    	$orders = Order::all();
    	return view('dashboard.orders.index',compact('orders'));
    }
}
