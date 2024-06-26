<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
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
	 * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
	 */
	public function rules(): array
	{
		return [
			'name' => [
				'required',
				'string',
			],
			'username' => [
				'required',
				'string',
			],
			'role' => [
				'required',
				'string',
			],
			'email' => [
				'required',
				'email',
				Rule::unique('users', 'email')
			],
			'contact_number' => [
				'required',
				'numeric',
				'max_digits:11',
				'min_digits:11'
			],
			'password' => [
				'required',
				'confirmed',
				Password::default(),
			],
		];
	}
}
