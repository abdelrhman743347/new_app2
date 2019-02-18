<?php

namespace App\Http\Controllers\Dashboard;

use App\product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['role:super_admin']);
    }    

    public function index(Request $request)
    {
        $categories = Category::all();
        $products = Product::
                when($request->search, function ($q) use ($request) 
            {
                return $q->where('name','like', '%' . $request->search . '%');
            })->when($request->category_id, function($q) use ($request){
                return $q->where('category_id', $request->category_id);
            })->latest()->paginate(5);



        // $products = Product::all() ;
        return view('dashboard.products.index', compact('categories','products') ); 

    } //end of index


    public function create()
    {
        $categories = Category::all();
        return view('dashboard.products.create', compact('categories'));
    }// end of create


    public function store(Request $request)
    {
        // dd($request->all());
        // 
        $rules = [
            'category_id' => 'required',
            'name' => 'required|unique:products,name',
            'description' => 'required',
            'price' => ['required','numeric'],
            'stock' => ['required','numeric'],
            'image'=>'required|image|mimes:jpeg,jpg,png,bmp,gif,svg',
        ];
        $request->validate($rules);

        $request_data = $request->all();


        if ($request->image) {
            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('images/products_images/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();

        }//end of if



        Product::create($request_data);

        session()->flash('success', __('Added successfully'));
        // return back();
        return redirect()->route('dashboard.products.index');
    }// end of store

    public function edit(product $product)
    {
        $categories = Category::all();
        return view('dashboard.products.edit', compact('categories', 'product'));
    }// end of edit product


    public function update(Request $request, product $product)
    {

        $rules = [
            'category_id' => 'required',
            'name' => ['required', Rule::unique('products')->ignore($product->id),],
            'description' => 'required',
            'price' => ['required','numeric'],
            'stock' => ['required','numeric'],
            // 'image'=>'required|image|mimes:jpeg,jpg,png,bmp,gif,svg',
        ];
        $request->validate($rules);

        $request_data = $request->all();
////////////////////////////////////

        if ($request->image) 
        {
            if ($product->image != 'default.png') 
            {
                Storage::disk('public_images')->delete('/products_images/' . $product->image);
            }//end of inner if

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('images/products_images/' . $request->image->hashName()));
        $request_data['image'] = $request->image->hashName();
        }//end of if

        $product->update($request_data);
        session()->flash('success', __('Updated successfully'));
        return redirect()->route('dashboard.products.index');

    }//end of update


    public function destroy(product $product)
    {

            if ($product->image != 'default.png') 
            {
                Storage::disk('public_images')->delete('/products_images/' . $product->image);
            }//end of if
        $product->delete();
        session()->flash('success', 'Deleted Successfully');
        return redirect()->route('dashboard.products.index');

    }

}
