<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class Item_display_controller extends Controller
{
    function index()
    {
        $response= Http::withHeaders(['Authorization'=>'Bearer '.session()->get('token'),'Accept'=>'application/json'])
        ->get('http://127.0.0.1:8000/api/item')->json();
        
        return view('items',['data'=>$response]);
        
   
        
    }
}

   