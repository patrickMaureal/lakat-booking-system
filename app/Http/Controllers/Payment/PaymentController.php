<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\StorePaymentRequest;
use App\Models\Payment\Payment;
use App\Models\Reservation\Reservation;
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

			$payments = Payment::join('reservations', 'payments.reservation_id', '=', 'reservations.id')
				->select('payments.id', 'payments.code as payment_code', 'reservations.code as code', 'amount', 'payments.created_at');

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
		$reservations = Reservation::where('payment_status', 'Unpaid')->select('id', 'code')->get();
		return view('payment.create', compact('reservations'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StorePaymentRequest $request)
	{
		$data = $request->validated();

		$reservation = Reservation::findOrFail($data['reservation']);

		try {

			DB::beginTransaction();

			// add Payment
			$reservation->payment()->create([
				'amount' => $data['amount']
			]);

			// update Reservation status
			$reservation->status = 'Confirmed';
			$reservation->payment_status = 'Paid';
			$reservation->save();

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

			// revert Reservation status
			Reservation::where('id', $payment->reservation_id)->update([
				'payment_status' => 'Unpaid',
				'status' => 'Pending'
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
