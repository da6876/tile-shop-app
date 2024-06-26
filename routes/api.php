<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\API\AuthUserController;
use \App\Http\Controllers\TSCategoryController;
use \App\Http\Controllers\TSSubCategoryController;
use \App\Http\Controllers\TSItemSizeController;
use \App\Http\Controllers\TSItemTypeController;
use \App\Http\Controllers\TSItemController;
use \App\Http\Controllers\TSItemStockController;
use \App\Http\Controllers\TSItemSalesController;

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

Route::get('/', function () {
    return 'welcome';
});

Route::post('login', [AuthUserController::class, 'login']);
Route::post('register', [AuthUserController::class, 'register']);

Route::middleware(['auth:api'])->group(function () {

    Route::get('GetsUsers', [AuthUserController::class, 'index']);
    Route::post('UpdateUsers', [AuthUserController::class, 'update']);
    Route::post('DeleteUsers', [AuthUserController::class, 'delete']);

    Route::get('Category', [TSCategoryController::class, 'index']);
    Route::post('AddCategory', [TSCategoryController::class, 'store']);
    Route::post('ShowCategory', [TSCategoryController::class, 'show']);
    Route::post('UpdateCategory', [TSCategoryController::class, 'update']);
    Route::post('DeleteCategory', [TSCategoryController::class, 'delete']);

    Route::get('SubCategory', [TSSubCategoryController::class, 'index']);
    Route::post('SubCategory', [TSSubCategoryController::class, 'getSubCategoryByCat']);
    Route::post('AddSubCategory', [TSSubCategoryController::class, 'store']);
    Route::post('ShowSubCategory', [TSSubCategoryController::class, 'show']);
    Route::post('UpdateSubCategory', [TSSubCategoryController::class, 'update']);
    Route::post('DeleteSubCategory', [TSSubCategoryController::class, 'delete']);

    Route::get('ItemSize', [TSItemSizeController::class, 'index']);
    Route::post('AddItemSize', [TSItemSizeController::class, 'store']);
    Route::post('ShowItemSize', [TSItemSizeController::class, 'show']);
    Route::post('UpdateItemSize', [TSItemSizeController::class, 'update']);
    Route::post('DeleteItemSize', [TSItemSizeController::class, 'delete']);

    Route::get('ItemType', [TSItemTypeController::class, 'index']);
    Route::post('AddItemType', [TSItemTypeController::class, 'store']);
    Route::post('ShowItemType', [TSItemTypeController::class, 'show']);
    Route::post('UpdateItemType', [TSItemTypeController::class, 'update']);
    Route::post('DeleteItemType', [TSItemTypeController::class, 'delete']);

    Route::get('Item', [TSItemController::class, 'index']);
    Route::post('AddItem', [TSItemController::class, 'store']);
    Route::post('ShowItem', [TSItemController::class, 'show']);
    Route::post('UpdateItem', [TSItemController::class, 'update']);
    Route::post('DeleteItem', [TSItemController::class, 'delete']);

    Route::get('Stock', [TSItemStockController::class, 'index']);
    Route::post('AddStock', [TSItemStockController::class, 'store']);
    Route::post('ShowStock', [TSItemStockController::class, 'show']);
    Route::post('UpdateStock', [TSItemStockController::class, 'update']);
    Route::post('DeleteStock', [TSItemStockController::class, 'delete']);

    Route::get('Sales', [TSItemSalesController::class, 'index']);
    Route::post('AddSales', [TSItemSalesController::class, 'store']);
    Route::post('ShowSales', [TSItemSalesController::class, 'show']);
    Route::post('UpdateSales', [TSItemSalesController::class, 'update']);
    Route::post('DeleteSales', [TSItemSalesController::class, 'delete']);
});
