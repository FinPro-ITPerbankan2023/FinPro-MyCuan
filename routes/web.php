<?php

use App\Http\Controllers\RegisterPenerimaDanaController;
use App\Http\Controllers\RegisterPenerimaDatadiriController;
use App\Http\Controllers\RegisterRoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/register-role', [RegisterRoleController::class, 'registerRole'])->name('register-role');
Route::get('/register-borrower', [RegisterRoleController::class, 'RegisterBorrowerPage'])->name('register-borrower');
Route::get('/register-penerima-datadiri', [RegisterPenerimaDatadiriController::class, 'registerPenerimaDatadiri'])->name('register-penerima-datadiri');
Route::get('/register-penerima-dana', [RegisterPenerimaDanaController::class, 'registerpenerimadana'])->name('register-penerima-dana');



