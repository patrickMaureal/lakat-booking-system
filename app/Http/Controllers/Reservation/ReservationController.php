<?php

namespace App\Http\Controllers\Reservation;

use App\Http\Controllers\Controller;
use App\Models\Reservation\Reservation;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ReservationController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view('reservation.index');
	}

	public function showTable(Request $request)
	{
		if ($request->ajax()) {

			$customers = Reservation::select('id','code','created_at','checkin_date','checkout_date','status','payment_status','accommodation_amount');

			return DataTables::of($customers)
				->editColumn('checkin_date', function ($row) {
					return $row->checkin_date->format('F jS \of Y'); // human readable format
				})
				->editColumn('checkout_date', function ($row) {
					return $row->checkout_date->format('F jS \of Y'); // human readable format
				})
				->editColumn('created_at', function ($row) {
					return $row->created_at->format('F jS \of Y'); // human readable format
				})
				->addColumn('action', function ($row) {
					return view('reservation.table-buttons', compact('row'));
				})
				->rawColumns(['action', 'checkin_date', 'checkout_date', 'created_at'])
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
	public function show(Reservation $reservation)
	{
		return view('reservation.show', compact('reservation'));
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
	public function destroy(string $id)
	{
		//
	}
}
