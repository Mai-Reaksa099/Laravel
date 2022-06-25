<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
//|
//*/
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


//Route::resource('/products',Controllers\ProductController::class);
Route::post('/register', [Controllers\AuthController::class, 'register']);

Route::get('/products', [Controllers\ProductController::class, 'index']);
Route::get('/products/{id}', [Controllers\ProductController::class, 'show']);
Route::get('/products/search/{name}', [Controllers\ProductController::class, 'search']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/products', [Controllers\ProductController::class, 'store']);
    Route::put('/products/{id}', [Controllers\ProductController::class, 'update']);
    Route::delete('/products/{id}', [Controllers\ProductController::class, 'destroy']);
});
