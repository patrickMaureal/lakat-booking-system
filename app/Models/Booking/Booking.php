<?php

namespace App\Models\Booking;

use App\Models\Accomodation\Accomodation;
use App\Models\Payment\Payment;
use App\Services\BookingCodeService;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
	use HasFactory, HasUuids, SoftDeletes;

	protected $fillable = [
		'code',
		'code_counter',
		'checkin_date',
		'checkout_date',
		'booking_status',
		'payment_status',
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
	public function accomodation(): BelongsTo
	{
		return $this->belongsTo(Accomodation::class);
	}

}
