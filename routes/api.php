<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/students', function (Request $request) {
    return 'Students List';
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
  ], function ($route) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('register', [AuthController::class, 'register']);
  });

//   Route::group(['prefix' => 'auth'], function () {
//     Route::post('register', [AuthController::class, 'register']);
//     Route::post('login', [AuthController::class, 'login']);
//     Route::group(['middleware' => 'api'], function () {
//         Route::post('refresh', [AuthController::class, 'refreshToken']);
//         Route::post('logout', [AuthController::class, 'logout']);
//         Route::post('me', [AuthController::class, 'me']);
//     });
// });