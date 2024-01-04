<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
  use HasFactory, HasUuids, SoftDeletes;

	protected $fillable = [
		'amount',
		'payment_mode',
		'reference_number',
		'status'
	];
}
