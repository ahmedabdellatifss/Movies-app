<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return inertia('Users/Users', compact('users'));
        //return inertia('Users/Users', compact('users'));
    }

    public function create()
    {
        return inertia('Users/CreateUser');
    }


    public function store(Request $request)
    {
        $password = bcrypt($request->password);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'birthdate'=>$request->birthdate,
            'password'=> $password,
        ]);
        
        return redirect()->route('users.index')->with('message', 'User Created Successfully');
    }

    public function edit(User $user)
    {
        return inertia('Users/EditUser', ['user'=>$user]);
    }

    public function update(User $user,Request $request)
    {

        $user->name = $request->name;
        $user->email = $request->email;
        $user->birthdate = $request->birthdate;
        $user->password = $request->password;
        $user->save();

        return redirect()->route('users.index')->with('message', 'User Updated Successfully');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('message', 'User Deleted Successfully');
    }  
}
