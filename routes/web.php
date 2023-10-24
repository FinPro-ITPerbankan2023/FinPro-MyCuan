<?php


use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\Lender\LenderController;
use App\Http\Controllers\RegisterRoleController;
use App\Http\Controllers\Borrower\BorrowerController;
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
Route::get('/register-lender', [RegisterRoleController::class, 'RegisterLenderPage'])->name('register-lender');

Route::group(['middleware' => 'auth'], function() {

    Route::group(['middleware' => 'role:lender', 'prefix' => 'lender', 'as' => 'lender.'], function() {
        Route::resource('dashboard', BorrowerController::class);
    });
    Route::group(['middleware' => 'role:borrower', 'prefix' => 'borrower', 'as' => 'borrower.'], function() {
        Route::resource('dashboard', LenderController::class);
    });
});


Route::get('file-upload', [ FileUploadController::class, 'getFileUploadForm' ])->name('get.fileupload');
Route::post('file-upload', [ FileUploadController::class, 'store' ])->name('store.file');

