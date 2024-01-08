<?php

namespace App\Services;

use App\Models\Reservation;

class ReservationCodeService
{
	public function generate()
	{
		$time = time();

		$latestReservation = Reservation::latest()->first();

		if ($latestReservation) {
			$newReservationCodeCounter = $latestReservation->code_counter + 1;
			$newReservationCode = $time.$newReservationCodeCounter;
		} else {
			$newReservationCodeCounter = 1;
			$newReservationCode = $time.$newReservationCodeCounter;
		}

		return [
			'code' 					=> $newReservationCode,
			'code_counter' 	=> $newReservationCodeCounter,
		];

	}

}
