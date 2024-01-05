<?php

namespace App\Livewire\Booking\Wizard;

use App\Livewire\Booking\Wizard\Steps\Schedule;
use Spatie\LivewireWizard\Components\WizardComponent;

class BookingWizardComponent extends WizardComponent
{
  public function steps() : array
  {
		return [
      Schedule::class,
    ];
	}
}
