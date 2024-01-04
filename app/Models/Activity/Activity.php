<?php

namespace App\Models\Activity;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
	use HasFactory,HasUuids,SoftDeletes;

	protected $fillable = [
		'name',
		'description',
		'cost',
		'status',
		'quantity',
	];
}
