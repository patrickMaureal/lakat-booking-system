<?php

namespace App\Livewire\Booking\Wizard\Steps;

use App\Models\Accomodation\Accomodation;
use App\Models\Reservation\Reservation;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
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
		$this->contactInformations = collect($contactInformationSelectionState['customers']);


		// get selected schedule
		$this->schedule['checkin_date'] = Carbon::createFromFormat('Y-m-d', $scheduleSelectionState['checkin_date'])->format('M jS, Y');
    $this->schedule['checkout_date'] = Carbon::createFromFormat('Y-m-d', $scheduleSelectionState['checkout_date'])->format('M jS, Y');
    $this->schedule['total_days'] = $scheduleSelectionState['total_days'];

		return view('livewire.booking.wizard.steps.summary');
	}

	public function confirm()
	{

		try {
			DB::beginTransaction();

			// add Reservation
			$reservation 																		= new Reservation;
			$reservation->checkin_date 											= $this->schedule['checkin_date'];
			$reservation->checkout_date 			 							= $this->schedule['checkout_date'];
			$reservation->accomodation_id 									=	$this->accomodation->id;
			$reservation->status 														= 'Pending';
			$reservation->payment_status 										= 'Unpaid';
			$reservation->accommodation_amount 							= $this->accomodation->price;
			$reservation->save();

			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			$this->dispatch('close-booking-confirmation-modal');
			return $this->dispatch('alert', type:'error', message: 'Booking failed. Please review details and try again.');
		}

		$this->dispatch('close-booking-confirmation-modal');
    $this->dispatch('swal', type:'success', title: 'Booking Success', text: 'Receipt will be downloaded automatically.', url: route('booking.index'));

		// download receipt
		$pdfContent = Pdf::loadView('reservation.download.receipt', [
			'reservation' 								=> $reservation,
			'schedule' 										=> $this->schedule,
			'accomodation' 								=> $this->accomodation,
			'contactInformations' 				=> $this->contactInformations
		])->setPaper('A4', 'portrait')->output();
		return response()->streamDownload(
			fn () => print($pdfContent),
			"reservation-receipt.pdf"
		);

	}
}
