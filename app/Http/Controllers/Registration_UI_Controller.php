<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

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
       
        $response= Http::withHeaders(['Authorization'=>'Bearer 2|XgTEJdrnVdg4T51TInPbmHNZtHrRPmsH0gQiC7WF'])
        ->post('http://127.0.0.1:8000/api/register',[
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>$request->password
        ]);
       if($response['Result']=="Registration Successful")
       {
        return redirect('login');
       }
       else
       {
        return view('register',['register' => "Registration Unsuccessful"]);
       }
       
        }
}
