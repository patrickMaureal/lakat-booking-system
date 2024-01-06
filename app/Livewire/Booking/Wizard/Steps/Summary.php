<?php

namespace App\Livewire\Booking\Wizard\Steps;

use App\Models\Accomodation\Accomodation;
use App\Models\Booking\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Spatie\LivewireWizard\Components\StepComponent;

class Summary extends StepComponent
{

	public $schedule;
  public $accomodation;
  public $contactInformations;
	public function render()
	{
		// returns all state of the given step
    $accomodationSelectionState = $this->state()->forStep('accomodation-selection-step');
		$contactInformationSelectionState = $this->state()->forStep('contact-information-step');
    $scheduleSelectionState = $this->state()->forStep('schedule-selection-step');

		// get selected accomodation
    $this->accomodation = Accomodation::with(['media'])->findOrFail($accomodationSelectionState['selectedAccomodation']['id']);

		// get selected contact information
		$contactInformationCollection = collect($contactInformationSelectionState['customers']);
		$this->contactInformations = $contactInformationCollection->map(function ($item) {
			return collect($item)->except(['id'])->toArray();
		});

		// get selected schedule
		$this->schedule['checkin_date'] = Carbon::createFromFormat('Y-m-d', $scheduleSelectionState['checkin_date'])->format('M jS, Y');
    $this->schedule['checkout_date'] = Carbon::createFromFormat('Y-m-d', $scheduleSelectionState['checkout_date'])->format('M jS, Y');
    $this->schedule['total_days'] = $scheduleSelectionState['total_days'];

		return view('livewire.booking.wizard.steps.summary');
	}

	// public function confirm()
	// {

	// 	try {
	// 		DB::beginTransaction();

	// 		// add Booking
	// 		$booking 												= new Booking;
	// 		$booking->checkin_date 					= $this->schedule['checkin_date'];
	// 		$booking->checkout_date 			 	= $this->schedule['checkout_date'];
	// 		$booking->accomodation_id 			= $this->accomodation->id;
	// 		$booking->status 								= 'pending';
	// 		$booking->save();

	// 		// add Islet
	// 		$booking->islets()->sync($this->islets->pluck('id'));

	// 		// add Passenger
	// 		$booking->bookingPassengers()->createMany($this->passengers);

	// 		DB::commit();
	// 	} catch (\Throwable $th) {
	// 		DB::rollBack();
	// 		$this->dispatch('close-booking-confirmation-modal');
	// 		return $this->dispatch('alert', type:'error', message: 'Booking failed. Please review details and try again.');
	// 	}

	// 	$this->dispatch('close-booking-confirmation-modal');
  //   $this->dispatch('swal', type:'success', title: 'Booking Success', text: 'Receipt will be downloaded automatically.', url: route('booking.index'));

	// 	// booking qrcode
	// 	$bookingQrCode = base64_encode(QrCode::format('svg')->size(70)->generate( $booking->code ));

	// 	// download receipt
	// 	$pdfContent = Pdf::loadView('booking.download.receipt', [
	// 		'bookingQrCode' => $bookingQrCode,
	// 		'booking' 			=> $booking,
	// 		'schedule' 			=> $this->schedule,
	// 		'passengers' 		=> $this->passengers,
	// 		'islets' 				=> $this->islets,
	// 		'pumpboat' 			=> $this->pumpboat
	// 	])->setPaper('A4', 'portrait')->output();
	// 	return response()->streamDownload(
	// 		fn () => print($pdfContent),
	// 		"booking-receipt.pdf"
	// 	);

	// }
}
