<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking\Booking;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Revert extends Controller
{
	/**
	 * Handle the incoming request.
	 */
	public function __invoke(Request $request,Booking $booking)
	{
		if ($request->ajax()) {

			$booking->status = 'Booked';
			$booking->save();

			return response()->json([
				'success' => true,
				'message' => 'Booking has been checked in.'
			], Response::HTTP_OK);
		}
	}
}
