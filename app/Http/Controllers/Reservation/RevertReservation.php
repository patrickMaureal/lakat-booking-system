<?php

namespace App\Http\Controllers\Reservation;

use App\Http\Controllers\Controller;
use App\Models\Reservation\Reservation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RevertReservation extends Controller
{
	/**
	 * Handle the incoming request.
	 */
	public function __invoke(Request $request,Reservation $reservation)
	{
		if ($request->ajax()) {

			$reservation->status = 'Pending';
			$reservation->payment_status = 'Unpaid';
			$reservation->save();

			return response()->json([
				'success' => true,
				'message' => 'Reservation has been reverted.'
			], Response::HTTP_OK);
		}
	}
}
