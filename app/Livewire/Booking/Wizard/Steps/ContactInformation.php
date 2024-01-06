<?php

namespace App\Livewire\Booking\Wizard\Steps;

use Livewire\Attributes\Locked;
use Spatie\LivewireWizard\Components\StepComponent;

class ContactInformation extends StepComponent
{
	#[Locked]
  public $customers = [];

  #[Locked]
  public $id;

  public $first_name;
  public $last_name;
  public $email;
  public $phone_number;

	public function render()
	{
		return view('livewire.booking.wizard.steps.contact-information');
	}

	private function clearForm()
	{
		// clear form
		$this->reset('first_name', 'last_name', 'email', 'phone_number');
	}

	public function add()
	{
    return $this->dispatch('open-customer-form-modal');
	}
	public function store()
	{
		$newCustomer = [
			'id'											=> uniqid(),
			'first_name'  						=> $this->first_name,
			'last_name'  							=> $this->last_name,
			'email'  									=> $this->email,
			'phone_number'  					=> $this->phone_number,
		];

    $this->customers[] = $newCustomer;

		$this->clearForm();

    $this->dispatch('close-customer-form-modal');
		$this->dispatch('alert', type:'success', message: 'Customer has been successfully added.');
	}

	public function edit($customerId)
  {
    $this->dispatch('open-customer-form-modal');

    foreach ($this->customers as $item) {
      if ($item['id'] == $customerId) {

				$this->id = $item['id'];
				$this->first_name = $item['first_name'];
				$this->last_name = $item['last_name'];
				$this->email = $item['email'];
				$this->phone_number = $item['phone_number'];

      }
    }
  }

	public function update()
	{
    foreach ($this->customers as $key => $item) {
      if ($item['id'] == $this->id) {

				$this->customers[$key]['first_name'] = $this->first_name;
				$this->customers[$key]['last_name'] = $this->last_name;
				$this->customers[$key]['email'] = $this->email;
				$this->customers[$key]['phone_number'] = $this->phone_number;


				$this->clearForm();

        $this->dispatch('close-customer-form-modal');
        return $this->dispatch('alert', type:'success', message: 'Customer has been successfully updated.');

      }
    }
	}

	public function delete($customerId)
	{
    $this->dispatch('open-customer-delete-modal');

    foreach ($this->customers as $item) {
      if ($item['id'] == $customerId) {
				$this->id = $item['id'];
      }
    }
	}

	public function destroy()
  {
    foreach ($this->customers as $key => $item) {
      if ($item['id'] == $this->id) {

        unset($this->customers[$key]);

				$this->clearForm();

				$this->dispatch('close-customer-delete-modal');
        return $this->dispatch('alert', type:'success', message: 'Customer has been successfully deleted.');
      }
    }
  }

}
