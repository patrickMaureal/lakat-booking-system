<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking\Booking;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CancelBooking extends Controller
{
	/**
	 * Handle the incoming request.
	 */
	public function __invoke(Request $request,Booking $booking)
	{
		if ($request->ajax()) {

			$booking->booking_status = 'Cancelled';
			$booking->payment_status = 'Cancelled';
			$booking->save();

			return response()->json([
				'success' => true,
				'message' => 'Data has been successfully updated.'
			], Response::HTTP_OK);
		}
	}
}
