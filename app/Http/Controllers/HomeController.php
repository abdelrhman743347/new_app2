<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\Category;
use App\Models\Permission;
use App\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $products = Product::
                when($request->search, function ($q) use ($request) 
            {
                return $q->where('name','like', '%' . $request->search . '%');
            })->when($request->category_id, function($q) use ($request){
                return $q->where('category_id', $request->category_id);
            })->latest()->paginate(6);
            

        if (!auth()->user()) {
            return view('home', compact('categories','products'));
        }

        if(auth()->user()->hasRole('super_admin')){
            return view('dashboard.index');
        }
        else
        {
            return view('home', compact('categories','products'));
        }



    }
}
