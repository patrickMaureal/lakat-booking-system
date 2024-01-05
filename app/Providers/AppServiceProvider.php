<?php

namespace App\Providers;

use App\Livewire\Booking\Wizard\BookingWizardComponent;
use App\Livewire\Booking\Wizard\Steps\Schedule;
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

	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void
	{
		//
	}
}
