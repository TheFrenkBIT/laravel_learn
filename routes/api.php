<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [\App\Http\Controllers\AuthController::class, 'refresh']);
    Route::post('me', [\App\Http\Controllers\AuthController::class, 'me']);
});
Route::group(['namespace' => 'App\Http\Controllers\Post', 'middleware' => 'jwt.auth'], function (){
    Route::post('/posts', StoreController::class);
    Route::get('/post/create', CreateController::class);
    Route::get('/post', IndexController::class);
    Route::get('/posts/{post}/edit', EditController::class);
    Route::get('/posts/{post}', ShowController::class);
    Route::patch('/posts/{post}', UpdateController::class);
    Route::delete('/posts/{post}', DestroyController::class);
});
