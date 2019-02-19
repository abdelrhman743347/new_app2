<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Cart;
use App\Order;
use Auth;
use Session;

class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function getIndex()
    {
        $products = Product::all();
        return view('shop.index', compact('products'));
    }    

    public function getAddToCart(Request $request)
    { 

        $product = Product::find($request->product_id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));
        return back();
    }

    public function getCart()
    { 
        if (!Session::has('cart')) 
        {
            return view('carts.index');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('carts.index',[
            'products' => $cart->items, 
            'totalPrice' => $cart->totalPrice
        ]);
        // Session::forget('cart');
    }

    public function getCheckout()
    {
         if (!Session::has('cart')) 
        {
            return view('carts.index');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total =$cart->totalPrice;
        // return view('carts.checkout', compact('total'));
    }

    public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) 
        {
            return view('carts.index');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        // dd($cart);

        /* save the oreder in DB*/

        $orders = new Order();
        $orders->cart = serialize($cart);
        $orders->user_id = auth()->user()->id;
        $orders->user_name = auth()->user()->first_name;
        $orders->address = auth()->user()->address;
        //save related object to DB
        Auth::user()->orders()->save($orders);

        Session::forget('cart');


        // session()->flash
        return back()->with('status', 'YOR ORDER HAS SENT TO MANGMENT');

    }



    // public function index()
    // {

    // 	$categories = Category::all();
    //     $products = Product::all();
    //     $carts = Cart::all();
    //     $cartProduct=[];

    //     foreach ($carts as $item) {
    //         if ($item->user_id=(auth()->user()->id)) {
    //             $product=(Product::where( 'id', $item->product_id )->first());
    //             $cartProduct +=[$product] ;
    //         }
    //     }
    //         // $product = Product::where( 'id', $product_id )->first();

    // 	return view('carts.index', compact('categories','cartProduct'));

    // }

    // public function store(Request $request)
    // {
    //     // dd($request->all());
    // // $product = Product::where( 'id', $product_id )->first();
    // $session_id = session()->get( '_token' );
    // $user_id=auth()->user()->id;
    // // $product_id =$request->product_id;
    // Cart::create( [
    //     'user_id'      => $user_id,
    //     'session_id'   => $session_id,
    //     'product_id'   => $request->product_id,
    // ]);

    // return back();


    // }//end of store   


    // public function store2(Request $request)
    // {
    // 	// dd($request->all());
    //     // $user_id=auth()->user()->id;
    // // For Identification Purpose
    // // 
    // $session_id = session()->get( '_token' );
    // // Get Product Detils by ID
    // $product_id =$request->product_id;
    // $product_name =$request->product_name;
    // $product_price =$request->product_price;

    // $product = Product::where( 'id', $product_id )->first();
    // if ( $product == null ) {
    //   return abort( 404 );
    // }

    // if ( Cart::where( 'session_id', '=', $session_id )->exists() ) {

    //   //CHeck whether product exist if yes increase quantity
    //   $entry = Cart::where( [ 'session_id' => $session_id, 'product_id' => $product_id ] )->increment( 'qty', 1 );
    //   if ( ! $entry ) {
    //     Cart::create( [
    //       'session_id'   => $session_id,
    //       'product_id'   => $product_id,
    //       'product_name' => $product->name,
    //       'price'        => $product->price,
    //       'qty'          => 1
    //     ] );
    //   }
    // } else {
    //   Cart::create( [
    //     'session_id'   => $session_id,
    //     'product_id'   => $product_id,
    //     'product_name' => $product->name,
    //     'price'        => $product->price,
    //     'qty'          => 1
    //   ] );
    // }

        
    // 	return back();
    // }//end of stor
    
}
