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
Route::get('all-products',[\App\Http\Controllers\Api\CategoryController::class,'product']);

Route::group(["middleware" => ["auth:api"]], function(){

    Route::get("profile", [\App\Http\Controllers\Api\AuthController::class, "profile"]);



    Route::post("logout", [\App\Http\Controllers\Api\AuthController::class, "logout"]);



});
