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
Route::get('/showArticle/{article:uuid}', [App\Http\Controllers\ArticleController::class, 'show'])->name('showArticle');
Route::get('/listCategories', [App\Http\Controllers\ListCategoriesController::class, 'index'])->name('listCategories');
Route::get('/listCategory/{id}', [App\Http\Controllers\ListCategoriesController::class, 'show'])->name('listCategory');
Route::get('/Categories/{categoryName}', [App\Http\Controllers\ArticleController::class, 'index'])->name('showCategoryArticles');
Route::View('/about', 'about')->name('about');

//routes with no middleware


// admin routes 

Route::group(['middleware'=>'auth'], function(){
   Route::group(['middleware'=>'roleAdmin', 'prefix'=>'admin'], function(){
        Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
        Route::get('/writeArticle', [App\Http\Controllers\CategoryController::class, 'addCategory'])->name('addArticle');
        Route::post('/crateArticle', [App\Http\Controllers\ArticleController::class, 'store'])->name('crateArticle');
        // Route::group(['prefix'=>'category'], function(){    
        Route::get('/manageCategories', [App\Http\Controllers\CategoryController::class, 'index'])->name('manageCategories');
        Route::get('/addCategory', [App\Http\Controllers\CategoryController::class, 'create'])->name('addCategory');
        Route::post('/storeCategory', [App\Http\Controllers\CategoryController::class, 'store'])->name('storeCategory');
        Route::delete('/deleteCategory/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('deleteCategory');
        Route::get('/editCategory/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('editCategory');
        Route::post('/updateCategory/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('updateCategory');
    //     });
        Route::get('/manageTags', [App\Http\Controllers\TagController::class, 'index'])->name('manageTags');
        Route::get('/addTag', [App\Http\Controllers\TagController::class, 'create'])->name('addTag');
        Route::post('/storeTag', [App\Http\Controllers\TagController::class, 'store'])->name('storeTag');
        Route::get('/storeTag/{id}', [App\Http\Controllers\TagController::class, 'edit'])->name('editTag');
        Route::post('/updateTag/{id}', [App\Http\Controllers\TagController::class, 'update'])->name('updateTag');
        Route::delete('/deleteTag/{id}', [App\Http\Controllers\TagController::class, 'destroy'])->name('deleteTag');

        // TAG SEARCH in the addArticle section
        
        Route::get('/Tagsearch', [App\Http\Controllers\LiveSearch::class, 'action'])->name('Tagsearch');
        Route::get('/addArticleTag', [App\Http\Controllers\TagController::class, 'addArticleTag'])->name('addArticleTag');

        // show all articles and manage them
        Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'showAdminArticles'])->name('showAdminArticles');
        Route::get('/deleteArticle/{article:uuid}', [App\Http\Controllers\ArticleController::class, 'destroy'])->name('deleteArticle');
        Route::get('/editFunction/{article:uuid}', [App\Http\Controllers\ArticleController::class, 'edit'])->name('editArticle');
        Route::post('/updateFunction/{article:uuid}', [App\Http\Controllers\ArticleController::class, 'update'])->name('updateArticle');
        
    });
 
});

// authenticated user routes   

Route::group(['middleware'=>'auth'], function(){
    
});