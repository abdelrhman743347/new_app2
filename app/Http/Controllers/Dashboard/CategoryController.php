<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        // $categories = Category::paginate(5);
    $categories = Category::when($request->search, function($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->search . '%');

        })->latest()->paginate(5);
        return view('dashboard.categories.index', compact('categories'));

    }// End of index

    
    public function create()
    {
        return view('dashboard.categories.create');
    }// end of create

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name'
        ]);
        if (Category::create($request->all())) 
        {
            session()->flash('success', __('Category Added Successfully'));
            return redirect()->route('dashboard.categories.index');
        }
            session()->flash('success', __('Category NOT Added'));
            return redirect()->route('dashboard.categories.index');
        
    }// end of store


    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }// end of edit


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,'.$category->id
        ]);

        if ($category->update($request->all())) 
        {
            session()->flash('success', __('Category Updated Successfully'));
            return redirect()->route('dashboard.categories.index');
        }
        else
        {
            session()->flash('success', __('Category NOT Updated'));
            return back();
        }

    }// end of update


    public function destroy(Category $category)
    {
       $category->delete();
        session()->flash('success', __('Category Deleted Successfully'));
        return redirect()->route('dashboard.categories.index');

    }
}
