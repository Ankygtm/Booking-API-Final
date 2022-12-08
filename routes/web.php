<?php

use App\Http\Controllers\Booking_controller;
use App\Http\Controllers\Item_display_controller;
use App\Http\Controllers\Login_UI;
use App\Http\Controllers\Registration_UI_Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/registration',[Registration_UI_Controller::class,'index']);
Route::post('/registration',[Registration_UI_Controller::class,'register']);
Route::group(['middleware'=>"session"],function(){
    Route::get('/', function () {
        return view('welcome');
    });
    // Route::get('/items',[Item_display_controller::class,'index']);
    
 Route::get('/items',[Item_display_controller::class,'index']);
    Route::get("/login", function () {
        return view('login');
    });
    Route::post("/login",[Login_UI::class,'index']);
    Route::get("/home", function () {
        return view('home');
    });
    Route::get('book/{id}',[Booking_controller::class,'show_booking']);
    Route::post('bookconfirm',[Booking_controller::class,'make_booking']);
    Route::get("/logout", function () {
        if(session()->has('name'))
        {
            session()->pull('name',null);
            return redirect('login');
        }
    });
});


