<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\AdminPanel\HomeSectionController;
use App\Http\Controllers\AdminPanel\CategoryController;
use \App\Http\Controllers\AdminPanel\SubcategoryController;
use \App\Http\Controllers\AdminPanel\BrandController;
use \App\Http\Controllers\AdminPanel\ColorController;
use \App\Http\Controllers\AdminPanel\SizeController;
use \App\Http\Controllers\AdminPanel\ProductController;
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
    Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('category_edit');
    Route::post('category/update',[CategoryController::class,'update'])->name('category_update');
    Route::get('category/unpublished/{id}',[CategoryController::class,'unpublished'])->name('category_unpublished');
    Route::get('category/published/{id}',[CategoryController::class,'published'])->name('category_published');
    Route::get('category/delete/{id}',[CategoryController::class,'destroy'])->name('category_destroy');


    Route::get('subcategory',[SubcategoryController::class,'index'])->name('admin.subcategory');
    Route::get('subcategory/add',[SubcategoryController::class,'add'])->name('add_subcategory');
    Route::post('subcategory/add',[SubcategoryController::class,'save'])->name('add_subcategory');
    Route::get('subcategory/edit/{id}',[SubcategoryController::class,'edit'])->name('subcategory.edit');
    Route::post('subcategory/update',[SubcategoryController::class,'update'])->name('subcategory.update');
    Route::get('subcategory/unpublished/{id}',[SubcategoryController::class,'unpublished'])->name('subcategory_unpublished');
    Route::get('subcategory/published/{id}',[SubcategoryController::class,'published'])->name('sub-category.published');
    Route::get('subcategory/delete/{id}',[SubcategoryController::class,'destroy'])->name('subcategory_delete');


    Route::get('brand',[BrandController::class,'index'])->name('admin.brand');
    Route::get('brand/add',[BrandController::class,'add'])->name('add.brand');
    Route::post('brand/add',[BrandController::class,'store'])->name('add.brand');
    Route::get('brand/edit/{id}', [BrandController::class, 'edit'])->name('brnad.edit');
    Route::post('brand/update', [BrandController::class, 'update'])->name('brnad.update');
    Route::get('brand/unpublished/{id}',[BrandController::class,'unpublished'])->name('brand_unpublished');
    Route::get('brand/published/{id}',[BrandController::class,'published'])->name('brand_published');
    Route::get('Brnad/delete/{id}',[BrandController::class,'destroy'])->name('brand_delete');

    Route::get('color',[ColorController::class,'index'])->name('admin.color');
    Route::get('color/add',[ColorController::class,'add'])->name('add.color');
    Route::post('color/add',[ColorController::class,'store'])->name('add.color');
    Route::get('color/status/{id}',[ColorController::class,'status'])->name('status.color');
    Route::get('color/edit/{id}', [ColorController::class, 'edit'])->name('color.edit');
    Route::post('color/update', [ColorController::class, 'update'])->name('color.update');
    Route::get('color/delete/{id}',[ColorController::class,'destroy'])->name('color_delete');

    Route::get('size',[SizeController::class,'index'])->name('admin.size');
    Route::get('size/add',[SizeController::class,'add'])->name('add.size');
    Route::post('size/add',[SizeController::class,'store'])->name('add.size');
    Route::get('size/edit/{id}', [SizeController::class, 'edit'])->name('size.edit');
    Route::post('size/update', [SizeController::class, 'update'])->name('size.update');
    Route::get('size/status/{id}',[SizeController::class,'status'])->name('status.size');
    Route::get('size/delete/{id}',[SizeController::class,'destroy'])->name('size_delete');

    Route::get('product', [ProductController::class, 'index'])->name('admin.product');
    Route::get('product/add', [ProductController::class, 'add'])->name('product.add');
    Route::post('product/subcateoryid',[ProductController::class, 'getSubId'])->name('product.subcatid');
    Route::post('product/add',[ProductController::class, 'store'])->name('product.add');
    Route::get('product/status/{id}',[ProductController::class, 'status'])->name('product.status');
    Route::get('product/edit/{id}',[ProductController::class, 'edit'])->name('product.edit');
    Route::post('product/update',[ProductController::class, 'update'])->name('product.update');
    Route::get('product/delete/{id}',[ProductController::class, 'destroy'])->name('product.delete');

    Route::get('product/single/view/{id}', [ProductController::class, 'show'])->name('product.single');

});
