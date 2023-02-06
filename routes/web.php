<?php

use Illuminate\Support\Facades\Route;


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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//routes with no middleware


// admin routes 

Route::group(['middleware'=>'auth'], function(){
   Route::group(['middleware'=>'roleAdmin', 'prefix'=>'admin'], function(){
        Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
        Route::get('/writeArticle', [App\Http\Controllers\ArticleController::class, 'index'])->name('addArticle');
        Route::post('/crateArticle', [App\Http\Controllers\ArticleController::class, 'store'])->name('crateArticle');
        // Route::group(['prefix'=>'category'], function(){
        Route::get('/manageCategories', [App\Http\Controllers\CategoryController::class, 'index'])->name('manageCategories');
        Route::get('/addCategory', [App\Http\Controllers\CategoryController::class, 'create'])->name('addCategory');
        Route::post('/storeCategory', [App\Http\Controllers\CategoryController::class, 'store'])->name('storeCategory');
        Route::delete('/deleteCategory/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('deleteCategory');
        Route::get('/editCategory/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('editCategory');
        Route::put('/updateCategory/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('updateCategory');
    //     });
    });
 
});

// authenticated user routes   

Route::group(['middleware'=>'auth'], function(){
    
});