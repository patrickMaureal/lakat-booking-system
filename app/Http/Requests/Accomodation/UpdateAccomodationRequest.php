<?php

namespace App\Http\Requests\Accomodation;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccomodationRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		return [
			'availability' 			=> ['required', 'string'],
			'name' 							=> ['required', 'string'],
			'min_stay' 					=> ['required', 'numeric'],
			'min_capacity' 			=> ['required', 'numeric'],
			'max_capacity' 			=> ['required', 'numeric'],
			'total_occupied' 		=> ['required', 'numeric'],
			'price' 						=> ['required', 'numeric'],
			'cover_photo'       => ['image'],
		];
	}
}
