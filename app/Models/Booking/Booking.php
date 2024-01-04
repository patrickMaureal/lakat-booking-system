<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
	use HasFactory, HasUuids, SoftDeletes;

	protected $fillable = [
		'booking_date',
		'checkin_date',
		'checkout_date',
		'payment_status',
		'booking_status',
	];
}
