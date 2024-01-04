<?php

namespace App\Models\Accomodation;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accomodation extends Model
{
	use HasFactory,HasUuids,SoftDeletes;

	protected $fillable = [
		'name',
		'description',
		'min_capacity',
		'max_capacity',
		'price',
	];
}
