<?php

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\UserBorrowersDetailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;

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

Route::get('/users', [UserController::class, 'getUsers']);
Route::post('/register', [CreateNewUser::class, 'register']);
//register Detail Borrowers
Route::post('/register/userDetail', [\App\Http\Controllers\Auth\UserBorrowersDetailController::class,'store'] );
Route::get('/register/userDetail', [\App\Http\Controllers\Auth\UserBorrowersDetailController::class,'getAll']);