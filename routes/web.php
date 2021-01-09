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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('forum/')->group(function (){
    Route::get('',[\App\Http\Controllers\HomeController::class,'index'])->name('forum.index');
    Route::post('store',[\App\Http\Controllers\HomeController::class,'store'])->name('forum.store');
});

Route::prefix('admin/forum/')->middleware('auth')->group(function (){
    Route::get('notviewed',[\App\Http\Controllers\Admin\AdminForumController::class,'notViewed'])->name('admin.forum.notViewed');
    Route::get('viewed',[\App\Http\Controllers\Admin\AdminForumController::class,'viewed'])->name('admin.forum.viewed');
    Route::get('update/{id}',[\App\Http\Controllers\Admin\AdminForumController::class,'update'])->name('admin.forum.update');
    Route::get('delete/{id}',[\App\Http\Controllers\Admin\AdminForumController::class,'delete'])->name('admin.forum.delete');

});
