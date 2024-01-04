<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	use HasFactory,HasUuids;

	protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'phone_number',
		'address',
	];
}
