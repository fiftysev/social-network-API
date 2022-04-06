<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\FollowersController;

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

Route::controller(UsersController::class)
    ->prefix('users')
    ->group(function () {
        Route::get('', 'index');
        Route::get('test', 'getProfileBackground');
        Route::post('test', 'addProfileBackground');
        Route::get('{id}', 'show');
    });

Route::controller(AuthController::class)
    ->prefix('auth')
    ->group(function () {
        Route::post('register', 'register');
        Route::post('login', 'login');
        Route::get('logout', 'logout')->middleware('auth:sanctum');
        Route::get('me', 'me')->middleware('auth:sanctum');
    });

Route::controller(FollowersController::class)
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::get('followers', 'show_followers');
        Route::get('following', 'show_following');
        Route::post('follow/{id}', 'store');
        Route::delete('follow/{id}', 'destroy');
    });
