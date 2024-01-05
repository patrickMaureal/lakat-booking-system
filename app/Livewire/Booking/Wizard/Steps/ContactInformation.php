<?php

namespace App\Livewire\Booking\Wizard\Steps;

use Spatie\LivewireWizard\Components\StepComponent;

class ContactInformation extends StepComponent
{
    public function render()
    {
        return view('livewire.booking.wizard.steps.contact-information');
    }
}
