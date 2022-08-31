<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[\App\Http\Controllers\Api\AuthController::class,'register']);
Route::post('login',[\App\Http\Controllers\Api\AuthController::class,'login']);

Route::get('brand',[\App\Http\Controllers\Api\CategoryController::class,'brand']);
Route::get('category',[\App\Http\Controllers\Api\CategoryController::class,'category']);
Route::get('subcat-product/{id}',[\App\Http\Controllers\Api\CategoryController::class,'subcatProduct']);
Route::get('brand-product/{id}',[\App\Http\Controllers\Api\CategoryController::class,'brandProduct']);
Route::get('all-products',[\App\Http\Controllers\Api\ProductController::class,'product']);

Route::get('product/trending',[\App\Http\Controllers\Api\ProductController::class,'trending']);
Route::get('product/popular',[\App\Http\Controllers\Api\ProductController::class,'popular']);
Route::get('product/exclusive',[\App\Http\Controllers\Api\ProductController::class,'exclusive']);

Route::get('product/details/{id}',[\App\Http\Controllers\Api\ProductController::class,'pro_details']);



Route::group(["middleware" => ["auth:api"]], function(){

    Route::get("profile", [\App\Http\Controllers\Api\AuthController::class, "profile"]);

    Route::post('address/save',[\App\Http\Controllers\Api\AddressController::class,'save']);
    Route::get('address/all',[\App\Http\Controllers\Api\AddressController::class,'all']);
    Route::get('address/remove/{id}',[\App\Http\Controllers\Api\AddressController::class,'remove']);

    Route::post("logout", [\App\Http\Controllers\Api\AuthController::class, "logout"]);


    Route::post('product/favourite/add',[\App\Http\Controllers\Api\FavouriteProductController::class,'favproduct']);

    Route::get('product/favourite',[\App\Http\Controllers\Api\FavouriteProductController::class,'favproductlist']);
    Route::get('product/favourite/remove/{id}',[\App\Http\Controllers\Api\FavouriteProductController::class,'remove']);

    Route::post('cart/add',[\App\Http\Controllers\Api\CartController::class,'add']);
    Route::get('cart/view',[\App\Http\Controllers\Api\CartController::class,'view']);
    Route::get('cart/remove/{id}',[\App\Http\Controllers\Api\CartController::class,'remove']);

    Route::post('rating',[\App\Http\Controllers\Api\RatingController::class,'add']);

//    Route::post('comment',[\App\Http\Controllers\Api\CommentController::class,'add']);





});
