<?php

use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteRegistrar;
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

// Retrieving An Input Value

// Request form 
Route::get('/index', function () {
    return view('form');
});
Route::any("Request",[TestController::class,"index"]);




// Request with id
Route::get('/personForm', function () {
    return view('personForm');
});

Route::any("Person/{id}",[TestController::class,"findId"]);



// Request all
Route::any("/route",function(Request $request){
    return $input = $request->input();
});