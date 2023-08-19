<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;




Route::get('/', function () {
    return view('welcome');
});
Route::get('ProductByCat/{id}',[ProductController::class,'getByCategory']);

// Route::resource("/products",ProductController::class);
// Route::post('AddTaxe','TaxeController@store');