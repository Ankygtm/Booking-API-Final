<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Booking_controller extends Controller
{
    public function show_booking($id)
    {
        $response= Http::withHeaders(['Authorization'=>'Bearer 2|XgTEJdrnVdg4T51TInPbmHNZtHrRPmsH0gQiC7WF','Accept'=>'application/json'])->get('http://127.0.0.1:8000/api/item/'.$id)->json();
        return view('book',['data'=>$response]);
        
    }
    public function make_booking(Request $request)
    {
        $response= Http::withHeaders(['Authorization'=>'Bearer 2|XgTEJdrnVdg4T51TInPbmHNZtHrRPmsH0gQiC7WF'])
        ->post('http://127.0.0.1:8000/api/addbooking',[
            "I_id"=>$request->I_id,
            "I_price"=>$request->I_price,
            "U_id"=>$request->U_id
        ]);
        return view('book_successful');
    }
    public function personal_booking($id)
    {
        $response= Http::withHeaders(['Authorization'=>'Bearer 2|XgTEJdrnVdg4T51TInPbmHNZtHrRPmsH0gQiC7WF','Accept'=>'application/json'])
        ->get('http://127.0.0.1:8000/api/booking/'.$id)->json();
        
        $items=array();
        $B_dates=array();
       foreach($response as $value)
       {
        array_push($B_dates,$value['B_time_end']);
        $I_id=$value['I_id'];
        $item= Http::withHeaders(['Authorization'=>'Bearer 2|XgTEJdrnVdg4T51TInPbmHNZtHrRPmsH0gQiC7WF','Accept'=>'application/json'])
        ->get('http://127.0.0.1:8000/api/item/'.$I_id)->json();
        array_push($items,$item);
       }
       return view('mybooking',['items'=>$items,'b_dates'=>$B_dates]);
// return $response;
    }
}
