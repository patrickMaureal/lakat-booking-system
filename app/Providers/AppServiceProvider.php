<?php

namespace App\Providers;

use App\Livewire\Booking\Wizard\BookingWizardComponent;
use App\Livewire\Booking\Wizard\Steps\AccomodationSelection;
use App\Livewire\Booking\Wizard\Steps\ContactInformation;
use App\Livewire\Booking\Wizard\Steps\Schedule;
use App\Livewire\Booking\Wizard\Steps\Summary;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 */
	public function register(): void
	{
		// if ($this->app->environment('local')) {
		// 	$this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
		// 	$this->app->register(TelescopeServiceProvider::class);
		// }
		Livewire::component('booking-wizard', BookingWizardComponent::class);

		Livewire::component('schedule-selection-step', Schedule::class);
		Livewire::component('accomodation-selection-step', AccomodationSelection::class);
		Livewire::component('contact-information-step', ContactInformation::class);
		Livewire::component('summary-step', Summary::class);
	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void
	{
		//
	}
}
