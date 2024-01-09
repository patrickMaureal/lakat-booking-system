<?php

namespace App\Http\Controllers\Reservation;

use App\Http\Controllers\Controller;
use App\Models\Booking\Booking;
use App\Models\Reservation\Reservation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BookReservation extends Controller
{
	/**
	 * Handle the incoming request.
	 */
	public function __invoke(Request $request,Reservation $reservation)
	{
		if ($request->ajax()) {

			$reservation->status = 'Booked';
			$reservation->save();

			// Now, create bookings based on the updated reservations
			Booking::create([
				'reservation_id' => $reservation->id,
				'checkin_date' 	 => $reservation->checkin_date,
				'checkout_date' => $reservation->checkout_date,
			]);

			return response()->json([
				'success' => true,
				'message' => 'Booking has been successfully created.'
			], Response::HTTP_OK);
		}
	}
}
