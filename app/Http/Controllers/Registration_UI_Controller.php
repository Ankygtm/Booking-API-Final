<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Registration_UI_Controller extends Controller
{
    function index()
    {
    return view('register');
    }
    function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed'
        ]); 
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $result=$user->save();
        if($result)
        {
        return redirect('login');
        }
        else
        {
            return view('register',['register' => "Registration Unsuccessful"]);
        }
    }
}
