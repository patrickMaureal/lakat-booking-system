<?php

namespace App\Http\Controllers\Accomodation;

use App\Http\Controllers\Controller;
use App\Http\Requests\Accomodation\StoreAccomodationRequest;
use App\Http\Requests\Accomodation\UpdateAccomodationRequest;
use App\Models\Accomodation\Accomodation;
use App\Models\Media\Media;
use App\Services\MediaAttachmentService;
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

			$accomodations = Accomodation::select('id', 'name','availability','total_occupied', 'price');

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
	public function store(StoreAccomodationRequest $request,MediaAttachmentService $accomodationAttachment):RedirectResponse
	{
		$validated = $request->validated();

		$accomodation 											= new Accomodation;
		$accomodation->name 								= $validated['name'];
		$accomodation->min_stay 						= $validated['min_stay'];
		$accomodation->min_capacity 				= $validated['min_capacity'];
		$accomodation->max_capacity 				= $validated['max_capacity'];
		$accomodation->total_occupied 			= $validated['total_occupied'];
		$accomodation->price 								= $validated['price'];
		$accomodation->save();

		$accomodationAttachment->uploadSingle($accomodation, $validated['cover_photo'], 'cover_photos');

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
		$accomodation->load('media');
		return view('accomodation.edit', compact('accomodation'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateAccomodationRequest $request, Accomodation $accomodation, MediaAttachmentService $accomodationAttachment)
	{
		$validated = $request->validated();

		$accomodation->name 								= $validated['name'];
		$accomodation->min_stay 						= $validated['min_stay'];
		$accomodation->min_capacity 				= $validated['min_capacity'];
		$accomodation->max_capacity 				= $validated['max_capacity'];
		$accomodation->total_occupied 			= $validated['total_occupied'];
		$accomodation->availability 				= $validated['availability'];
		$accomodation->price 								= $validated['price'];
		$accomodation->save();

		if (isset($validated['cover_photo'])) {
			$accomodationAttachment->uploadSingle($accomodation, $validated['cover_photo'], 'cover_photos');
		}

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

	public function destroyAttachment(Request $request, $media)
	{
		if ($request->ajax()) {

			Media::where('uuid', $media)->delete();
			return response()->json([
				'success' => true,
				'message' => 'Data has been successfully deleted.'
			], Response::HTTP_OK);
		}
	}
}
