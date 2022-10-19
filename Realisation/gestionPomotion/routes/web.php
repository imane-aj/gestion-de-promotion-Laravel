<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PromotionController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource("/promotion", PromotionController::class);
Route::get("search", [SearchController::class, 'searchPromo']);

Route::prefix('/student')->group(function(){
    Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [StudentController::class, 'update'])->name('update');
});
