<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\StorePaymentRequest;
use App\Models\Booking\Booking;
use App\Models\Payment\Payment;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class PaymentController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(): View
	{
		return view('payment.index');
	}

	public function showTable(Request $request)
	{
		if ($request->ajax()) {

			$payments = Payment::join('bookings', 'payments.booking_id', '=', 'bookings.id')
				->select('payments.id', 'payments.code as payment_code', 'bookings.code as code', 'amount', 'payments.created_at');

			return DataTables::of($payments)
				->editColumn('created_at', function ($row) {
					return $row->created_at->format('F jS \of Y'); // human readable format
				})
				->addColumn('action', 'payment.table-buttons')
				->rawColumns(['action', 'created_at'])
				->toJson();
		}
	}
	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$bookings = Booking::where('payment_status', 'Unpaid')->select('id', 'code')->get();
		return view('payment.create', compact('bookings'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StorePaymentRequest $request)
	{
		$data = $request->validated();

		$booking = Booking::findOrFail($data['booking']);

		try {

			DB::beginTransaction();

			// add Payment
			$booking->payment()->create([
				'amount' => $data['amount']
			]);

			// update Booking status
			$booking->booking_status = 'Confirmed';
			$booking->payment_status = 'Paid';
			$booking->save();

			DB::commit();

			toast('Payment has been successfully added.', 'success');

			return redirect()->route('payments.index');

		} catch (\Throwable $th) {
			DB::rollBack();
			toast('Invalid request', 'error');
		}

	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Request $request, Payment $payment)
	{
		if ($request->ajax()) {

			// revert Booking status
			Booking::where('id', $payment->booking_id)->update([
				'payment_status' => 'Unpaid',
				'booking_status' => 'Pending'
			]);

			// delete Payment
			$payment->delete();

			return response()->json([
				'success' => true,
				'message' => 'Data has been successfully deleted.'
			], Response::HTTP_OK);
		}
	}
}
