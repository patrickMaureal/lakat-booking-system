<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking\Booking;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class BookingController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(): View
	{
		return view('booking.index');
	}

	public function showTable(Request $request)
	{
		if ($request->ajax()) {

			$bookings = Booking::join('reservations', 'bookings.reservation_id', '=', 'reservations.id')
				->select('bookings.id', 'bookings.code as booking_code', 'reservations.code as code','bookings.created_at','bookings.status');

			return DataTables::of($bookings)
				->editColumn('created_at', function ($row) {
					return $row->created_at->format('F jS \of Y'); // human readable format
				})
				->addColumn('action', function ($row) {
					return view('booking.table-buttons', compact('row'));
				})
				->rawColumns(['action', 'created_at'])
				->toJson();
		}
	}
	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		//
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
	public function edit(Booking $booking)
	{
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
	public function destroy(string $id)
	{
		//
	}
}
