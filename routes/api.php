<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/all_invoices',[InvoiceController::class,'index']);

// Route::get('/all_customer',[CustomerController::class,'index']);

Route::get('/search_invoice',[InvoiceController::class,'searchInvoice']);

Route::get('/create_invoice',[InvoiceController::class,'createInvoice']);

Route::get('/customers',[CustomerController::class,'all_customer']);

