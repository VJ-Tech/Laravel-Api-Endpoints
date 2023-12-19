<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MerchandiseController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchasedItemController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SoldItemController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Models\Merchandise;
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

Route::get('/customers', [CustomerController::class,'index']);
Route::get('/customers/{customerId}', [CustomerController::class, 'getCustomerWithSales']);
Route::delete('/customers/{customerId}', [CustomerController::class,'destroy']);

Route::get('/merchandises', [MerchandiseController::class,'index']);
Route::get('/merchandises/{merchandiseId}', [MerchandiseController::class,'getMerchandisesWithSoldItemsAndPurchasedItems']);

Route::get('/purchases', [PurchaseController::class,'index']);
Route::get('/purchases/{purchaseId}', [PurchaseController::class, 'getPurchasesWithSupplierUserAndPurchasedItems']);

Route::get('/purchaseditems', [PurchasedItemController::class,'index']);
Route::get('/purchaseditems/{purchaseditem}', [PurchasedItemController::class,'getPurchasedItemsWithPurchasesAndMerchandises']);

Route::get('/sales', [SaleController::class,'index']);
Route::get('/sales/{saleId}', [SaleController::class, 'getSalesWithCustomerUserAndSoldItems']);

Route::get('/solditems', [SoldItemController::class,'index']);
Route::get('/solditems/{solditem}', [SoldItemController::class,'getSoldItemsWithSalesAndMerchandises']);

Route::get('/suppliers', [SupplierController::class,'index']);
Route::get('/suppliers/{supplierId}', [SupplierController::class, 'getSupplierWithPurchases']);
Route::delete('/suppliers/{supplierId}', [SupplierController::class,'destroy']);

Route::get('/users', [UserController::class,'index']);
Route::get('/users/{userId}', [UserController::class, 'getUserWithSalesAndPurchases']);
Route::delete('/users/{userId}', [UserController::class, 'destroy']);
Route::post('/users',[UserController::class, 'store']);
Route::patch('/users/{userId}',[UserController::class,'update']);
Route::put('/users/{userId}', [UserController::class,'update']);
