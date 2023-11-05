<?php


use App\Http\Controllers\RegisterRoleController;
use App\Http\Controllers\Borrower\BorrowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterPenerimaDanaController;
use App\Http\Controllers\RegisterPenerimaDatadiriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PolicyController;

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
    return view('home');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');})->name('dashboard');
});

Route::get('/register-role', [RegisterRoleController::class, 'registerRole'])->name('register-role');
Route::get('/register-borrower', [RegisterRoleController::class, 'RegisterBorrowerPage'])->name('register-borrower');
Route::get('/register-penerima-datadiri', [RegisterPenerimaDatadiriController::class, 'registerPenerimaDatadiri'])->name('register-penerima-datadiri');
Route::get('/kebijakan-privasi', [PolicyController::class, 'policy'])->name('kebijakan-privasi');

Route::get('/prasyarat', function () {
    return view('prasyarat');
});



Route::get('/coba', function () {
    return view('coba');
});
