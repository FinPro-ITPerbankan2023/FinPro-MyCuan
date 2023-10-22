<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\RegisterRoleController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\User\UserController;
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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');})->name('dashboard');
});

Route::get('/register-role', [RegisterRoleController::class, 'registerRole'])->name('register-role');
Route::get('/register-borrower', [RegisterRoleController::class, 'RegisterBorrowerPage'])->name('register-borrower');
Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'role:user', 'prefix' => 'user', 'as' => 'user.'], function() {
        Route::resource('dashboard', UserController::class);
    });
    Route::group(['middleware' => 'role:seller', 'prefix' => 'seller', 'as' => 'seller.'], function() {
        Route::resource('dashboard', SellerController::class);
    });
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::resource('dashboard', AdminController::class);
    });

});


