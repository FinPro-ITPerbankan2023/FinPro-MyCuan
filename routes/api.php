<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserLenderRegistrationController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\UserIdentityController;

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

Route::get('/user-lender', [UserLenderRegistrationController::class, 'getUsers']);
Route::post('/detail-lender', [UserLenderRegistrationController::class, 'register']);
Route::get('/users', [UserController::class, 'getUsers']);
Route::post('/register', [UserController::class, 'register']);

Route::get('/user-identity', [UserIdentityController::class, 'getUsers']);
Route::post('/register-identity', [UserIdentityController::class, 'register']);

