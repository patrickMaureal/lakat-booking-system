<?php

namespace App\Livewire\Booking\Wizard\Steps;

use App\Models\Customer\Customer;
use Spatie\LivewireWizard\Components\StepComponent;

class ContactInformation extends StepComponent
{
	public $first_name;
	public $last_name;
	public $email;
	public $phone_number;
	public function render()
	{
		return view('livewire.booking.wizard.steps.contact-information');
	}

	protected function rules()
  {
		return [
			'first_name' 			=> 'required',
			'last_name' 			=> 'required',
			'email' 				=> 'required|email',
			'phone_number' 		=> 'required',
		];
  }

	public function store()
	{
		$data = $this->validate();

		$customer = new Customer;
		$customer->first_name = $data['first_name'];
		$customer->last_name = $data['last_name'];
		$customer->email = $data['email'];
		$customer->phone_number = $data['phone_number'];
		$customer->save();

		$this->clearForm();

		$this->dispatch('refresh-parent');
		$this->dispatch('alert', type:'success', message: 'Data has been saved successfully.', title: 'Booking Passenger');
	}

	public function clearForm()
  {
    $this->resetErrorBag();
    $this->resetValidation();
    $this->reset(['bookingPassenger','name', 'age','sex','nationality','pwd']);
  }
}
