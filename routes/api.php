<?php

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\Lender\EditProfileLender;
use App\Http\Controllers\Marketplace\LoanListsController;
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

Route::get('/business', [BusinessController::class, 'getBusiness']);
Route::post('/business', [BusinessController::class, 'InsertTable']);

Route::get('/edit-profile-lender', [EditProfileLender::class, 'retrieveData']);
Route::put('/edit-profile-lender', [EditProfileLender::class, 'editData']);

Route::get('/marketplace', [LoanListsController::class, 'retrieveLoanList']);



