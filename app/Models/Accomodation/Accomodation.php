<?php

namespace App\Models\Accomodation;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Accomodation extends Model implements HasMedia
{
	use HasFactory,HasUuids,SoftDeletes, InteractsWithMedia;

	protected $fillable = [
		'name',
		'min_stay',
		'min_capacity',
		'max_capacity',
		'availability',
		'total_occupied',
		'availability',
		'price',
	];
}
