<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'App\Http\Controllers\Post'], function () {
    Route::get('/find', [\App\Http\Controllers\PostController::class, 'index']);
    Route::get('/tailwind', [\App\Http\Controllers\PostController::class, 'tailwind']);
    Route::get('/posts/create', CreateController::class)->name('post.create');
    Route::post('/posts', StoreController::class)->name('post.store');
    Route::get('/posts', IndexController::class)->name('post.index');
    Route::get('/posts/{post}', ShowController::class)->name('post.show');
    Route::get('/posts/{post}/edit', EditController::class)->name('post.edit');
    Route::patch('/posts/{post}', UpdateController::class)->name('post.update');
    Route::delete('/posts/{post}', DestroyController::class)->name('post.destroy');
});
Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Post'], function () {
        Route::get('/post', IndexController::class)->name('admin.post.index');
        Route::get('/post/create', CreateController::class)->name('admin.post.create');
        Route::post('/posts', StoreController::class)->name('admin.post.store');
        Route::get('/posts/{post}/edit', EditController::class)->name('admin.post.edit');
        Route::get('/posts/{post}', ShowController::class)->name('admin.post.show');
        Route::patch('/posts/{post}', UpdateController::class)->name('admin.post.update');
        Route::delete('/posts/{post}', DestroyController::class)->name('admin.post.destroy');
    });
});
