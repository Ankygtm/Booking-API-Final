<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login_UI extends Controller
{
    public function index(Request $request)
    {
         $request->validate([
            // 'name'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ]); 
       
        $data=array(
            // 'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        );
        if(Auth::attempt($data))
        {
         
            
            $id=User::where('email',$request->email)->pluck('id');
            $name=User::where('email',$request->email)->pluck('name');
            $request->session()->put('name',$name[0]);
            $request->session()->put('id',$id[0]);
           
            return redirect('home');
        }
        else
        {
            return back()->with('error','Wrong Login details');
        }

    }
}
