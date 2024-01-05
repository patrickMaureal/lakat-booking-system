<?php

namespace App\Http\Controllers\Accomodation;

use App\Http\Controllers\Controller;
use App\Http\Requests\Accomodation\StoreAccomodationRequest;
use App\Http\Requests\Accomodation\UpdateAccomodationRequest;
use App\Models\Accomodation\Accomodation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use function Ramsey\Uuid\v1;

class AccomodationController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request): View
	{
		return view('accomodation.index');
	}

	public function showTable(Request $request)
	{
		if ($request->ajax()) {

			$accomodations = Accomodation::select('id', 'name', 'min_capacity', 'max_capacity', 'price');

			return DataTables::of($accomodations)
				->addColumn('action', 'accomodation.table-buttons')
				->rawColumns(['action'])
				->toJson();
		}
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create(): View
	{
		return view('accomodation.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreAccomodationRequest $request):RedirectResponse
	{
		$validated = $request->validated();

		$accomodation 										= new Accomodation;
		$accomodation->name 							= $validated['name'];
		$accomodation->description 				= $validated['description'];
		$accomodation->min_capacity 			= $validated['min_capacity'];
		$accomodation->max_capacity 			= $validated['max_capacity'];
		$accomodation->price 							= $validated['price'];
		$accomodation->save();

		toast('Accomodation has been successfully added.', 'success');
		return redirect()->route('accomodations.index');
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
	public function edit(Accomodation $accomodation)
	{
		return view('accomodation.edit', compact('accomodation'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateAccomodationRequest $request, Accomodation $accomodation): RedirectResponse
	{
		$validated = $request->validated();

		$accomodation->name 							= $validated['name'];
		$accomodation->description 				= $validated['description'];
		$accomodation->min_capacity 			= $validated['min_capacity'];
		$accomodation->max_capacity 			= $validated['max_capacity'];
		$accomodation->price 							= $validated['price'];
		$accomodation->save();

		toast('Accomodation has been successfully updated.', 'success');
		return redirect()->route('accomodations.index');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Request $request,Accomodation $accomodation)
	{
		if($request->ajax()) {
			$accomodation->delete();

			return response()->json([
				'success'  => true,
				'message'  => 'Accomodation has been successfully deleted.'
			], Response::HTTP_OK);
		}
	}
}
