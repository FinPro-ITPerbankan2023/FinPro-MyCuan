<?php

use App\Http\Controllers\Auth\RegisterDetailBorrowController;
use App\Http\Controllers\RegisterUserIndentityBorrowController;
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

Route::post('/register/detailUser',[RegisterDetailBorrowController::class, 'store'])->name('user.registerDetail');
Route::post('/register/detailUserKTP',[RegisterUserIndentityBorrowController::class, 'store'])->name('user.registerDetailKTP');
