<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthenticationController;
use App\Http\Controllers\Api\UsersController;

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



Route::controller(AuthenticationController::class)->prefix('v1')->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});

// Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
//     Route::resource('users', UsersController::class);
// });

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::prefix('v1')->group(function () {
    Route::get('users', [UsersController::class, 'index']);
    Route::get('users/{id?}', [UsersController::class, 'show']);
    Route::post('users/create', [UsersController::class, 'store']);
    Route::put('user/update/{id?}', [UsersController::class, 'update']);
    Route::delete('user/delete/{id?}', [UsersController::class, 'destroy']);
});
