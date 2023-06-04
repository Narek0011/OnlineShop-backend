<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'jwt.auth'], function ($router) {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('user', [AuthController::class, 'getUser']);

});
Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);


Route::apiResources([
    'products' => ProductController::class,
]);

Route::post('/addProductToCart', [ProductController::class, 'addProductToCart']);
Route::get('/getProductsToCart/{id}', [ProductController::class, 'getProductsToCart']);
Route::delete('/deleteProductsToCart/{id}', [ProductController::class, 'deleteProductsToCart']);
Route::put('/updateProductToCart', [ProductController::class, 'updateProductToCart']);
