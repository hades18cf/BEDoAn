<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;


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
Route::group([
    'prefix' => 'v1',
], function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('register', 'register');
        Route::post('login', 'login');
        Route::group([
            'middleware' => ['auth:api']
        ], function () {
            // Authentication
            Route::post('logout', 'logout');

            // Profile
            Route::controller(ProfileController::class)->group(function () {
                Route::get('profile', 'index');
            });

            // Customer
            Route::controller(CustomerController::class)->group(function () {
                Route::get('customer', 'index');
            });

            Route::group([
                'prefix' => 'product',
            ], function () {
                // Product
                Route::controller(ProductController::class)->group(function () {
                    Route::get('product', 'index');
                    Route::get('getProducts', 'getProducts');
                    Route::post('create', 'create');
                    Route::post('update/{id}', 'update');
                    Route::get('detail', 'detail');
                    Route::delete('delete/{id}', 'delete');
                });
            });

            Route::group([
                'prefix' => 'user',
            ], function () {
                // User
                Route::controller(UserController::class)->group(function () {
                    Route::get('user', 'index');
                    Route::get('getUsers', 'getUsers');
                    Route::post('create', 'create');
                    Route::post('update/{id}', 'update');
                    Route::get('detail', 'detail');
                    Route::delete('delete/{id}', 'delete');
                });
            });
        });
    });
});
