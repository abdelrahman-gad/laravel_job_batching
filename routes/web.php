<?php

use Illuminate\Support\Facades\Route;
use  Illuminate\Http\Request;

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
use App\Http\Controllers\SalesController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/upload',[SalesController::class,'index']);


Route::post('/upload',[SalesController::class,'upload'])->name('upload');

Route::get('/batch ',[SalesController::class,'batch'])->name('batch');