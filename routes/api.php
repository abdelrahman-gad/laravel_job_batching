<?php


use App\Http\Controllers\SalesController;

Route::get('/upload',[SalesController::class,'index']);


Route::post('/upload',[SalesController::class,'upload'])->name('upload');

Route::get('/batch ',[SalesController::class,'batch'])->name('batch');