<?php


use App\Http\Controllers\Filament\LogoutController;
use App\Http\Controllers\RegisterPageController;
use App\Http\Controllers\Borrower\BorrowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterPenerimaDanaController;
use App\Http\Controllers\RegisterPenerimaDatadiriController;
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
    return view('home');
});

Route::get('/register-role', [RegisterPageController::class, 'registerRole'])->name('register-role');
Route::get('/register-borrower', [RegisterPageController::class, 'RegisterBorrowerPage'])->name('register-borrower');
Route::get('/register-lender', [RegisterPageController::class, 'RegisterLenderPage'])->name('register-lender');
Route::get('/register-borrower-profile', [RegisterPageController::class, 'RegisterBorrowerProfilePage'])->name('register-borrower-profile');
Route::get('/register-borrower-business', [RegisterPageController::class, 'RegisterBorrowerBusinessPage'])->name('register-borrower-business');

Route::post('/auth/logout', [LogoutController::class, 'logout'])->name('filament.admin.auth.logout')->middleware('role:admin');
Route::post('/auth/lender-logout', [LogoutController::class, 'logout'])->name('filament.lender.auth.logout')->middleware('role:lender');
Route::post('/auth/borrower-logout', [LogoutController::class, 'logout'])->name('filament.borrower.auth.logout')->middleware('role:borrower');






