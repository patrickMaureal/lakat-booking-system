<?php

namespace App\Livewire\Booking\Wizard\Steps;

use App\Models\Accomodation\Accomodation;
use Spatie\LivewireWizard\Components\StepComponent;

class AccomodationSelection extends StepComponent
{
	public $selectedAccomodation;
	public $search = '';

	public function render()
	{
		$accomodations = Accomodation::where('name', 'LIKE', "%{$this->search}%")->select('id', 'name')->limit(5)->get();

		return view('livewire.booking.wizard.steps.accomodation-selection',[
			'accomodations' => $accomodations
		]);
	}

	public function selectAccomodation(Accomodation $accomodation)
  {
    $this->selectedAccomodation = $accomodation;
    return $this->dispatch('alert', type:'success', message: 'Accomodation selected.');
  }
}
