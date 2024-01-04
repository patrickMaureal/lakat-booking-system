<?php

namespace App\Http\Controllers\Accomodation;

use App\Http\Controllers\Controller;
use App\Http\Requests\Accomodation\StoreAccomodationRequest;
use App\Http\Requests\Accomodation\UpdateAccomodationRequest;
use App\Models\Accomodation\Accomodation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use function Ramsey\Uuid\v1;

class AccomodationController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request): View
	{
		$searchVal = $request->search ?? null;

		$accomodations = Accomodation::where('name', 'LIKE', '%'.$searchVal.'%')->paginate(5)->withQueryString();

		return view('accomodation.index', compact('accomodations', 'searchVal'));
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

		return redirect()->route('accomodations.index')->with('status', 'Accomodation has been successfully added.');
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

		$accomodation 										= new Accomodation;
		$accomodation->name 							= $validated['name'];
		$accomodation->description 				= $validated['description'];
		$accomodation->min_capacity 			= $validated['min_capacity'];
		$accomodation->max_capacity 			= $validated['max_capacity'];
		$accomodation->price 							= $validated['price'];
		$accomodation->save();

		return redirect()->route('accomodations.index')->with('status', 'Accomodation has been successfully added.');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Accomodation $accomodation): RedirectResponse
	{
		// delete Accomodation
		$accomodation->delete();

		// redirect to accomodation page
		return redirect()->route('accomodations.index')->with('status', 'Accomodation has been successfully deleted.');
	}
}
