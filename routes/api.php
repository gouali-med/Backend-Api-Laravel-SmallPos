<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaxeController;
use App\Http\Controllers\TypePaymentController;
use App\Http\Controllers\UniteOfSaleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;





/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Taxe Route
Route::get('TaxeAll',[TaxeController::class,'GetAll']);
Route::post('AddTaxe',[TaxeController::class,'store']);
Route::delete('DeleteTaxe/{id}',[TaxeController::class,'destroy']);
Route::post('UpdateTaxe/{id}',[TaxeController::class,'update']);


//UniteOfSale Route
Route::get('UniteOfSaleAll',[UniteOfSaleController::class,'GetAll']);
Route::post('AddUniteOfSale',[UniteOfSaleController::class,'store']);
Route::delete('DeleteUniteOfSale/{id}',[UniteOfSaleController::class,'destroy']);
Route::post('UpdateUniteOfSale/{id}',[UniteOfSaleController::class,'update']);

//TypePayment Route
Route::get('TypePaymentAll',[TypePaymentController::class,'GetAll']);
Route::post('AddTypePayment',[TypePaymentController::class,'store']);
Route::delete('DeleteTypePayment/{id}',[TypePaymentController::class,'destroy']);
Route::post('UpdateTypePayment/{id}',[TypePaymentController::class,'update']);

//Category Route
Route::get('Category/{id}',[CategoryController::class,'show']);
Route::get('CategoryAll',[CategoryController::class,'GetAll']);
Route::post('AddCategory',[CategoryController::class,'store']);
Route::delete('DeleteCategory/{id}',[CategoryController::class,'destroy']);
Route::post('UpdateCategory/{id}',[CategoryController::class,'update']);


//Client Route
Route::get('Client/{id}',[ClientController::class,'show']);
Route::get('ClientAll',[ClientController::class,'GetAll']);
Route::post('AddClient',[ClientController::class,'store']);
Route::delete('DeleteClient/{id}',[ClientController::class,'destroy']);
Route::post('UpdateClient/{id}',[ClientController::class,'update']);

//Company Route
Route::get('Company/{id}',[CompanyController::class,'show']);
Route::get('CompanyAll',[CompanyController::class,'GetAll']);
Route::post('AddCompany',[CompanyController::class,'store']);
Route::delete('DeleteCompany/{id}',[CompanyController::class,'destroy']);
Route::post('UpdateCompany/{id}',[CompanyController::class,'update']);

//Product Route
Route::get('Product/{id}',[ProductController::class,'show']);
Route::get('ProductByCat/{id}',[ProductController::class,'getByCategory']);

Route::get('ProductAll',[ProductController::class,'GetAll']);
Route::post('AddProduct',[ProductController::class,'store']);
Route::delete('DeleteProduct/{id}',[ProductController::class,'destroy']);
Route::post('UpdateProduct/{id}',[ProductController::class,'update']);
 
		
//Sale Route
Route::get('Sale/{id}',[SaleController::class,'show']);
Route::get('SaleAll',[SaleController::class,'GetAll']);
Route::post('AddSale',[SaleController::class,'store']);
Route::delete('DeleteSale/{id}',[SaleController::class,'destroy']);
Route::post('UpdateSale/{id}',[SaleController::class,'update']);
 
		