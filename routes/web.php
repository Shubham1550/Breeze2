<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

use App\Http\Controllers\FrontController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
// Route::view('form','blog.create',)->name('blog.create');
Route::get('/',[FrontController::class,'index'])->name('welcome');
Route::get('post/{id}',[FrontController::class,'show'])->name('post.show');


Route::get('form',[BlogController::class,'create'])->name('blog.create');

// Route::get('create',[BlogController::class,'create'])->name('blog.create');
    Route::get('blogs/index',[BlogController::class,'index'])->name('blog.index');

    Route::post('store',[BlogController::class,'store'])->name('store');
    Route::get('table',[BlogController::class,'index'])->name('table');

    Route::get('blog/editform/{id}',[BlogController::class,'edit'])->name('blog.editform');
    Route::post('update/{id}',[BlogController::class,'update'])->name('update');

    Route::get('delete/{id}',[BlogController::class,'delete'])->name('delete');


    //category

    Route::view('category/create','category/create',)->name('category.create');
    Route::post('category/store',[CategoryController::class,'store'])->name('category.store');
    Route::get('category/index',[CategoryController::class,'index'])->name('category.index');
    Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('category/update/{id}',[CategoryController::class,'update'])->name('category.update');

    Route::get('category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');



});

