<?php

namespace App\Models\Reservation;

use App\Models\Accomodation\Accomodation;
use App\Models\Booking\Booking;
use App\Models\Payment\Payment;
use App\Services\ReservationCodeService;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
	use HasFactory, SoftDeletes, HasUuids;

	protected $fillable = [
		'code',
		'code_counter',
		'checkin_date',
		'checkout_date',
		'status',
		'payment_status',
		'accommodation_amount',
	];

	protected static function booted(): void
	{
		static::creating(function (Model $model) {

			$reservationCodeService = new ReservationCodeService;

			// generate Booking Code
			$data = $reservationCodeService->generate();

			$model->code					= $data['code'];
			$model->code_counter	= $data['code_counter'];
		});
	}

	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		'checkin_date' => 'datetime',
		'checkout_date' 	=> 'datetime',
	];

	public function payment(): HasOne
	{
		return $this->hasOne(Payment::class);
	}
	public function booking(): HasOne
	{
		return $this->hasOne(Booking::class);
	}
	public function accomodation(): BelongsTo
	{
		return $this->belongsTo(Accomodation::class);
	}
}
