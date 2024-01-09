<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

use App\Models\User;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request): View
	{
		return view('user.index');
	}

	public function showTable(Request $request)
	{
		if ($request->ajax()) {

			$users = User::where('id', '!=', Auth::id())->select('id', 'name', 'username', 'role', 'contact_number');

			return DataTables::of($users)
				->addColumn('action', 'user.table-buttons')
				->rawColumns(['action', 'created_at'])
				->toJson();
		}
	}
	/**
	 * Show the form for creating a new resource.
	 */
	public function create(): View
	{
		return view('user.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreUserRequest $request): RedirectResponse
	{
		// Retrieve the validated input...
		$validated = $request->validated();

		// store new User to database
		$user 								= new User;
		$user->name 					= $validated['name'];
		$user->username    	 	= $validated['username'];
		$user->role						= $validated['role'];
		$user->email 					= $validated['email'];
		$user->contact_number = $validated['contact_number'];
		$user->password 			= Hash::make($validated['password']);
		$user->save();

		toast('User has been successfully added.', 'success');
		return redirect()->route('users.index');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(User $user): View
	{
		return view('user.show', compact('user'));
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
	public function update(UpdateUserRequest $request, User $user): RedirectResponse
	{
		// Retrieve the validated input...
		$validated = $request->validated();

		// update User
		$user->name 					= $validated['name'];
		$user->username    	 	= $validated['username'];
		$user->role						= $validated['role'];
		$user->email 					= $validated['email'];
		$user->contact_number = $validated['contact_number'];

		if ($request->has('password')) {
			// dd($request->password);
			$user->password 	= Hash::make($validated['password']);
		}

		$user->update();

		toast('User has been successfully updated.', 'success');
		return redirect()->route('users.index');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Request $request, User $user)
	{
		if ($request->ajax()) {

			$user->delete();

			return response()->json([
				'success'  => true,
				'message'  => 'User has been successfully deleted.'
			], Response::HTTP_OK);
		}
	}
}
