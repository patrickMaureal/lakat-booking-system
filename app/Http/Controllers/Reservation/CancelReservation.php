<?php

namespace App\Http\Controllers\Reservation;

use App\Http\Controllers\Controller;
use App\Models\Reservation\Reservation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CancelReservation extends Controller
{
	/**
	 * Handle the incoming request.
	 */
	public function __invoke(Request $request,Reservation $reservation)
	{
		if ($request->ajax()) {

			$reservation->status = 'Cancelled';
			$reservation->payment_status = 'Cancelled';
			$reservation->save();

			return response()->json([
				'success' => true,
				'message' => 'Reservation has been cancelled'
			], Response::HTTP_OK);
		}
	}
}
