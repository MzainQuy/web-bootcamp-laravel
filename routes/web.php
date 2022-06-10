<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\user\UserCheckoutController;
use App\Http\Controllers\user\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\CheckoutController as AdminCheckout;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


// socialate route
Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'HandleProviderCallback'])->name('user.login.callback');

// midtrans routes
Route::get('payment/success', [UserCheckoutController::class, 'midtransCallback']);
Route::post('payment/success', [UserCheckoutController::class, 'midtransCallback']);


Route::middleware(['auth'])->group(function () {
    // checkout route
    Route::get('checkout/success', [UserCheckoutController::class, 'success'])->name('cheackout.success')->middleware('ensureUserRole:user');
    Route::get('checkout/{camp:slug}', [UserCheckoutController::class, 'create'])->name('cheackout.create')->middleware('ensureUserRole:user');
    Route::post('checkout/{camp}', [UserCheckoutController::class, 'store'])->name('cheackout.store')->middleware('ensureUserRole:user');

    // dashboard route
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    // user Dashboard route
    Route::prefix('user/dashboard')->namespace('User')->name('user.')->middleware('ensureUserRole:user')->group(function () {
        Route::get('/', [UserDashboard::class, 'index'])->name('dashboard');
    });
    // admin Dashboard route
    Route::prefix('admin/dashboard')->namespace('Admin')->name('admin.')->middleware('ensureUserRole:admin')->group(function () {
        Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');

        // admin checkout route
        Route::post('checkout/{checkout:id}', [AdminCheckout::class, 'update'])->name('checkout.update');
    });
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
