<?php

use App\Http\Controllers\Accomodation\AccomodationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Booking\BookingController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

	// profile
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

	// users
	Route::prefix('users')->name('users.')->group(function () {
		Route::get('table', [UserController::class, 'showTable'])->name('table');
	});
	Route::resource('users', UserController::class);

	// customers
	Route::resource('customers', CustomerController::class);

	// accomodation
	Route::prefix('accomodations')->name('accomodations.')->group(function () {
		Route::get('table', [AccomodationController::class, 'showTable'])->name('table');
	});
	Route::resource('accomodations', AccomodationController::class);

	//booking
	Route::resource('bookings', BookingController::class);

	//payments
	Route::resource('payments', PaymentController::class);



});

require __DIR__.'/auth.php';
