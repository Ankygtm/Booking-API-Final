<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class Item_display_controller extends Controller
{
    function index()
    {
        $response= Http::withHeaders(['Authorization'=>'Bearer 2|XgTEJdrnVdg4T51TInPbmHNZtHrRPmsH0gQiC7WF','Accept'=>'application/json'])
        ->get('http://127.0.0.1:8000/api/item')->json();
        
        return view('items',['data'=>$response]);
        
   
        
    }
}

   