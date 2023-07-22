<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{RoleController,HomeController,CategoryController,SubcategoryController,
    ProductController,FrontendController,BannerController};
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


Route::get('/', [FrontendController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//all user roles routes starts
Route::get('/role',[RoleController::class, 'addform']);
Route::post('/role/add',[RoleController::class, 'storerole']);
//all user roles routes ends

//all category routes starts
Route::prefix('category')->group(function(){
    Route::get('/create',[CategoryController::class, 'create'])->name('category.create');
    Route::post('/store',[CategoryController::class, 'store']);
    Route::get('/index',[CategoryController::class, 'index'])->name('category.index');
    Route::get('/delete/{id}',[CategoryController::class, 'destroy']);
    Route::get('/trashed',[CategoryController::class, 'deletedcategory'])->name('category.trashed');
    Route::get('/restore/{id}',[CategoryController::class, 'categoryrestore'])->name('category.restore');
    Route::get('/vanish/{id}',[CategoryController::class, 'categoryvanish'])->name('category.force');
    Route::get('/edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update',[CategoryController::class, 'update'])->name('category.update');
});
//all category routes ends

//all subcategory routes starts
Route::prefix('subcategory')->group(function(){
    Route::get('/create',[SubcategoryController::class, 'create'])->name('subcategory.create');
    Route::post('/store',[SubcategoryController::class, 'store'])->name('subcategory.store');
    Route::get('/index',[SubcategoryController::class, 'index'])->name('subcategory.index');
    Route::get('/edit/{id}',[SubcategoryController::class, 'edit'])->name('subcategory.edit');
    Route::post('/update',[SubcategoryController::class, 'update'])->name('subcategory.update');
    Route::get('/delete/{id}', [SubcategoryController::class, 'delete'])->name('subcategory.delete');
});
//all subcategory routes ends

//all products routes stars
Route::prefix('product')->group(function(){
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/index', [ProductController::class, 'index'])->name('product.index');
    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/update}', [ProductController::class, 'update'])->name('product.update');
});
//all products routes ends

//all banner routes starts
Route::prefix('banner')->group(function(){
    Route::get('/create', [BannerController::class, 'create'])->name('banner.create');
    Route::post('/stote', [BannerController::class, 'store'])->name('banner.store');
});
//all banner routes ends

//middleware user and admin route starts
Route::get('/user/dashboard',function(){
    return "User deshboard pore kaj korbo";
});
//middleware user and admin route ends
