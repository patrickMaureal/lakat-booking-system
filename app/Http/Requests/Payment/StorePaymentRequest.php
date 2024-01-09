<?php

namespace App\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePaymentRequest extends FormRequest
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
			'reservation' => [
				'required',
				Rule::exists('reservations', 'id'),
			],
			'amount' => ['required', 'numeric'],
		];
	}
}
