<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\user\UserCheckoutController;
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



Route::middleware(['auth'])->group(function () {
    // checkout route
    Route::get('checkout/success', [UserCheckoutController::class, 'success'])->name('cheackout.success');
    Route::get('checkout/{camp:slug}', [UserCheckoutController::class, 'create'])->name('cheackout.create');
    Route::post('checkout/{camp}', [UserCheckoutController::class, 'store'])->name('cheackout.store');

    // user dashboard route
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
