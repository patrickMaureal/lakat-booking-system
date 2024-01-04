<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\StoreCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use App\Models\Customer\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request): View
	{
		$searchVal = $request->search ?? null;

		$customers = Customer::select('*')
			->where(function ($query) use ($searchVal) {
				$query->where('first_name', 'LIKE', '%' . $searchVal . '%')
					->orWhere('last_name', 'LIKE', '%' . $searchVal . '%');
			})
			->paginate(5)
			->withQueryString();

		// $customers = Customer::where('first_name', 'LIKE', '%' . $searchVal . '%')
		// 	->orWhere('last_name', 'LIKE', '%' . $searchVal . '%')
		// 	->paginate(5)
		// 	->withQueryString();

		return view('customer.index', compact('customers', 'searchVal'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create(): View
	{
		return view('customer.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreCustomerRequest $request): RedirectResponse
	{
		// Retrieve the validated input...
		$validated = $request->validated();

		// store new User to database
		$customer 																= new Customer;
		$customer->first_name 										= $validated['first_name'];
		$customer->last_name 											= $validated['last_name'];
		$customer->email 													= $validated['email'];
		$customer->phone_number 									= $validated['phone_number'];
		$customer->address 												= $validated['address'];
		$customer->save();

		// redirect to users page
		return redirect()->route('customers.index')->with('status', 'Customer has been successfully added.');
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
	public function edit(Customer $customer): View
	{
		return view('customer.edit', compact('customer'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateCustomerRequest $request, Customer $customer): RedirectResponse
	{
		// Retrieve the validated input...
		$validated = $request->validated();

		// store new User to database
		$customer->first_name 										= $validated['first_name'];
		$customer->last_name 											= $validated['last_name'];
		$customer->email 													= $validated['email'];
		$customer->phone_number 									= $validated['phone_number'];
		$customer->address 												= $validated['address'];
		$customer->save();

		// redirect to users page
		return redirect()->route('customers.index')->with('status', 'Customer has been successfully added.');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Customer $customer): RedirectResponse
	{
		// delete User
		$customer->delete();

		// redirect to users page
		return redirect()->route('customers.index')->with('status', 'Customer has been successfully deleted.');
	}
}
