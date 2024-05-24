<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\API\AuthUserController;
use \App\Http\Controllers\TSControllerController;
use \App\Http\Controllers\TSSubCategoryController;
use \App\Http\Controllers\TSItemSizeController;
use \App\Http\Controllers\TSItemTypeController;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/', function () {
    return 'welcome';
});
Route::post('login', [AuthUserController::class, 'login']);
Route::post('register', [AuthUserController::class, 'register']);

Route::middleware(['auth:api'])->group(function () {
    Route::get('SubCategory', [TSSubCategoryController::class, 'index']);
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

    Route::resource('category', TSControllerController::class);
});
