<?php

namespace App\Models\Booking;

use App\Models\Reservation\Reservation;
use App\Services\BookingCodeService;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
	use HasFactory,SoftDeletes,HasUuids;

	protected $fillable = [
		'code',
		'code_counter',
		'reservation_id',
		'checkin_date',
		'checkout_date',
		'status',
	];

	protected static function booted(): void
	{
		static::creating( function(Model $model) {

			$bookingCodeService = new BookingCodeService;

			// generate Booking Code
			$data = $bookingCodeService->generate();

			$model->code					= $data['code'];
			$model->code_counter	= $data['code_counter'];
		});
	}

	public function reservation(): BelongsTo
	{
		return $this->belongsTo(Reservation::class);
	}

}
