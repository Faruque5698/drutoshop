<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\AdminPanel\HomeSectionController;
use App\Http\Controllers\AdminPanel\CategoryController;
//use Image;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function() {
    $img = Image::make('foo.jpg')->resize(300, 200);
    return $img->response('jpg');
});

Auth::routes();

Route::get('/homes', [App\Http\Controllers\HomeController::class, 'index'])->name('homes');

//Route::get('dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

Route::group(['prefix'=>'admin','middleware'=>'auth','middleware'=>'checkRole'],function (){
    Route::get('dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('homes',[HomeSectionController::class,'home'])->name('admin.homes');
    Route::post('update_home',[HomeSectionController::class,'update_home'])->name('update.homes');

    Route::get('category',[CategoryController::class,'index'])->name('admin.category');
    Route::get('category/add',[CategoryController::class,'add'])->name('add_category');
    Route::post('category/store',[CategoryController::class,'store'])->name('category_store');

});
