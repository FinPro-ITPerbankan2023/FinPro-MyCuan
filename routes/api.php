<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserBorrowerRegistrationController;
use \App\Http\Controllers\UserDetail;
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

Route::get('/users-borrower', [UserBorrowerRegistrationController::class, 'getUsers']);
Route::post('/detail-borrower', [UserBorrowerRegistrationController::class, 'register']);
Route::get('/users', [UserDetail::class, 'getUsers']);
Route::post('/register', [UserDetail::class, 'register']);

Route::get('/user-identity', [UserIdentityController::class, 'getUsers']);
Route::post('/register-identity', [UserIdentityController::class, 'register']);

