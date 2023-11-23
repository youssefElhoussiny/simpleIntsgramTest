<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('users.index' , compact('user'));
    }
    public function edit(User $user)
    {
        return view('users.edit' , compact('user'));
    }
    public function update(User $user , UpdateUserRequest $request)
    {
        $data = $request->all();
        $data['private_account']=$request->has('private_account') ? true : false;
  
        if($request->has('image'))
        {
             $path= $request->file('image')->store('users','public' );
             $data['image'] = '/'.$path;
        }

       $data['password']= $request['password'] ? Hash::make($request['password']) : auth()->user()->password;
       $user->update($data);

       session()->flash('success' , 'The profile has been update');
       return redirect()->route('user_profile' , $user);
        
    }
}
