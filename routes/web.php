<?php

use App\Http\Controllers\Accomodation\AccomodationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Booking\BookingController;
use App\Http\Controllers\Booking\Checkin;
use App\Http\Controllers\Booking\Checkout;
use App\Http\Controllers\Booking\Revert;
use App\Http\Controllers\Home\BookingController as HomeBookingController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Reservation\BookReservation;
use App\Http\Controllers\Reservation\CancelReservation;
use App\Http\Controllers\Reservation\ReservationController;
use App\Http\Controllers\Reservation\RevertReservation;
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

Route::get('/booking',[HomeBookingController::class,'index' ])->name('booking.index');

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

	// profile
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

	// users
	Route::resource('users', UserController::class);
	// accomodation
	Route::prefix('accomodations')->name('accomodations.')->group(function () {
		Route::get('table', [AccomodationController::class, 'showTable'])->name('table');
		Route::delete('destroy-attachment/{media}', [AccomodationController::class, 'destroyAttachment'])->name('destroy-attachment');
	});
	Route::resource('accomodations', AccomodationController::class);

	//reservation
	Route::prefix('reservations')->name('reservations.')->group(function () {
		Route::get('table', [ReservationController::class, 'showTable'])->name('table');
		Route::put('/revert/{reservation}', RevertReservation::class)->name('revert');
		Route::put('/cancel/{reservation}', CancelReservation::class)->name('cancel');
		Route::post('/book/{reservation}', BookReservation::class)->name('book');
	});
	Route::resource('reservations', ReservationController::class);

	//payments
	Route::prefix('payments')->name('payments.')->group(function () {
		Route::get('table', [PaymentController::class, 'showTable'])->name('table');
	});
	Route::resource('payments', PaymentController::class);

	//booking
	Route::prefix('bookings')->name('bookings.')->group(function () {
		Route::get('table', [BookingController::class, 'showTable'])->name('table');
		Route::put('/checkin/{booking}', Checkin::class)->name('checkin');
		Route::put('/checkout/{booking}', Checkout::class)->name('checkout');
		Route::put('/revert/{booking}', Revert::class)->name('revert');
	});
	Route::resource('bookings', BookingController::class);


});

require __DIR__.'/auth.php';
