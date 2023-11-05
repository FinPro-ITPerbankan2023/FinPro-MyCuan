<?php

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\FileUploadController;
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
//user common
Route::get('/users', [UserController::class, 'getUsers']);
Route::post('/register', [CreateNewUser::class, 'register']);
//user detail borrower
Route::post('/register/borrowers', [\App\Http\Controllers\Borrower\BorrowerController::class,'store'])->name('register-borrowers');
Route::get('/register/borrowers', [\App\Http\Controllers\Borrower\BorrowerController::class,'getAll'])->name('register.borrowers.getAll');

Route::get('/business', [\App\Http\Controllers\BusinessController::class, 'getBusiness']);
Route::post('/business', [\App\Http\Controllers\BusinessController::class, 'InsertTable']);

Route::get('/edit-profile-lender', [\App\Http\Controllers\Lender\EditProfileLender::class, 'retrieveData']);
Route::put('/edit-profile-lender', [\App\Http\Controllers\Lender\EditProfileLender::class, 'editData']);


