<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Http\Requests\Activity\StoreActivityRequest;
use App\Http\Requests\Activity\UpdateActivityRequest;
use App\Models\Activity\Activity;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActivityController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request): View
	{
		$searchVal = $request->search ?? null;

		$activities = Activity::where('name', 'LIKE', '%'.$searchVal.'%')->paginate(5)->withQueryString();

		return view('activity.index',compact('activities', 'searchVal'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create(): View
	{
		return view('activity.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreActivityRequest $request): RedirectResponse
	{
		$validated = $request->validated();

		$activity 									= new Activity;
		$activity->name							= $validated['name'];
		$activity->description 			= $validated['description'];
		$activity->cost 						= $validated['cost'];
		$activity->quantity 				= $validated['quantity'];
		$activity->save();

		return redirect()->route('activities.index')->with('status', 'Activity has been successfully added.');
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
	public function edit(Activity $activity): View
	{
    return view('activity.edit',compact('activity'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateActivityRequest $request, Activity $activity): RedirectResponse
	{
		$validated = $request->validated();

		$activity->name							= $validated['name'];
		$activity->description 			= $validated['description'];
		$activity->cost 						= $validated['cost'];
		$activity->quantity 				= $validated['quantity'];
		$activity->status						= $validated['status'];
		$activity->save();

		return redirect()->route('activities.index')->with('status', 'Activity has been successfully updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Activity $activity): RedirectResponse
	{
		$activity->delete();

		return redirect()->route('activities.index')->with('status', 'Activity has been successfully deleted.');
	}
}
