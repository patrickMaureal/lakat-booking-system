<?php

namespace App\Livewire\Booking\Wizard;

use App\Livewire\Booking\Wizard\Steps\AccomodationSelection;
use App\Livewire\Booking\Wizard\Steps\ContactInformation;
use App\Livewire\Booking\Wizard\Steps\Schedule;
use Spatie\LivewireWizard\Components\WizardComponent;

class BookingWizardComponent extends WizardComponent
{
  public function steps() : array
  {
		return [
      Schedule::class,
			AccomodationSelection::class,
			ContactInformation::class,
    ];
	}
}
