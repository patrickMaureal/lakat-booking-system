<?php

namespace App\Livewire\Booking\Wizard\Steps;

use Spatie\LivewireWizard\Components\StepComponent;

class Summary extends StepComponent
{
	public function render()
	{
		return view('livewire.booking.wizard.steps.summary');
	}
}
