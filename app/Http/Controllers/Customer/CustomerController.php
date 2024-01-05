<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\StoreCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

use App\Models\Customer\Customer;

class CustomerController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(): View
	{
		return view('customer.index');
	}

	public function showTable(Request $request)
	{
		if ($request->ajax()) {

			$customers = Customer::select('id', 'first_name', 'last_name', 'email', 'phone_number');

			return DataTables::of($customers)
				->addColumn('full_name', function ($customer) {
					return $customer->first_name . ' ' . $customer->last_name;
				})
				->addColumn('action', 'customer.table-buttons')
				->rawColumns(['action'])
				->toJson();
		}
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

		toast('Customer has been successfully added.', 'success');
		return redirect()->route('customers.index');
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
		toast('Customer has been successfully updated.', 'success');
		return redirect()->route('customers.index');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Request $request, Customer $customer)
	{
		if ($request->ajax()) {

			$customer->delete();

			return response()->json([
				'success'  => true,
				'message'  => 'Customer has been successfully deleted.'
			], Response::HTTP_OK);
		}
	}
}
