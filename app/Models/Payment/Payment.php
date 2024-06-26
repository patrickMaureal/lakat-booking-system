<?php

namespace App\Models\Payment;

use App\Models\Reservation\Reservation;
use App\Services\PaymentCodeService;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
  use HasFactory, HasUuids, SoftDeletes;

	protected $fillable = [
		'code',
		'code_counter',
		'reservation_id',
		'amount',
	];

	protected static function booted(): void
	{
		static::creating( function(Model $model) {

			$paymentCodeService = new PaymentCodeService;

			// generate Payment Code
			$data = $paymentCodeService->generate();

			$model->code					= $data['code'];
			$model->code_counter	= $data['code_counter'];
		});
	}

	public function reservation(): BelongsTo
	{
		return $this->belongsTo(Reservation::class);
	}
}
