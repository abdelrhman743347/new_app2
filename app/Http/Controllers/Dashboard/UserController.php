<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function __construct()
    
{        $this->middleware(['role:super_admin']);
    }

    public function index(Request $request)
    {
        $users = User::where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {

                return $query->where('first_name', 'like', '%' . $request->search . '%')
                    ->orWhere('last_name', 'like', '%' . $request->search . '%');

            });})->latest()->paginate(5);

        // $users = User::all() ;
        return view('dashboard.users.index', compact('users') ); 

    } //end of index


    public function create()
    {
        return view('dashboard.users.create');
    }// end of create


    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'phone' => ['required','numeric'],
            'image'=>'required|image|mimes:jpeg,jpg,png,bmp,gif,svg',
            'address' => 'required',
            'password' => 'required|confirmed',
        ]);

        $request_data = $request->except(['password', 'password_confirmation','image']);
        $request_data['password'] = bcrypt($request->password);


        if ($request->image) {
            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('images/users_images/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();

        }//end of if



        $user = User::create($request_data);
        // $user->attachRole('user');
        // $user->syncPermissions($request->permissions);

        session()->flash('success', __('Added successfully'));
        // return back();
        return redirect()->route('dashboard.users.index');
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit',compact('user'));
    }// end of edit user


    public function update(Request $request, User $user)
    {
        // dd($request);
        $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => ['required', Rule::unique('users')->ignore($user->id),],
                'phone' => ['required','numeric'],
                'image'=>'image|mimes:jpeg,jpg,png,bmp,gif,svg',
                'address' => 'required',
                'password' => 'required|confirmed',
        ]);

        $request_data = $request->except(['password', 'password_confirmation','image']);
        $request_data['password'] = bcrypt($request->password);


        if ($request->image) {
            if ($user->image != 'default.png') {
                Storage::disk('public_images')->delete('/users_images/' . $user->image);
            }//end of inner if

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('images/users_images/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();
        }//end of if
        $user->update($request_data);

        session()->flash('success', __('Updated successfully'));
        return redirect()->route('dashboard.users.index');

    }//end of update


    public function destroy(User $user)
    {

        if ($user->image != 'default.png') {

            Storage::disk('public_images')->delete('/users_images/' . $user->image);

        }//end of if
        $user->delete();
        session()->flash('success', 'Deleted Successfully');
        return redirect()->route('dashboard.users.index');

    }

}
