<x-app-layout>

	{{-- per page status --}}
	@if ( session('status') )
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
			<div class="alert alert-success" role="alert">
				{{ session('status') }}
			</div>
		</div>
	@endif

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
		<div class="d-block mb-md-0">
			<h2 class="h4">Customers</h2>
		</div>
		<div class="btn-toolbar mb-2 mb-md-0">
			<a href="{{ route('customers.create') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
				<i class="icon icon-xs me-2 bi bi-plus-lg"></i>
				Add Customer
			</a>
		</div>
	</div>
	<div class="table-settings mb-4">
		<div class="row align-items-center justify-content-between">
			<div class="col col-md-6 col-lg-3 col-xl-4">
				<form action="{{ route('customers.index') }}" method="GET">
					<div class="input-group me-2 me-lg-3 fmxw-400">
						<input type="text" name="search" value="{{ $searchVal }}" class="form-control" placeholder="Search name">
						<span class="input-group-text">
							<button type="submit" class="btn btn-xs">
								<i class="icon fs-6 bi bi-search"></i>
							</button>
						</span>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="card card-body border-0 shadow table-wrapper table-responsive mb-5">
		<table class="table table-hover">
			<thead>
				<tr>
					<th class="border-gray-200">No.</th>
					<th class="border-gray-200">Name</th>
					<th class="border-gray-200">Email</th>
					<th class="border-gray-200">Phone Number</th>
					<th class="border-gray-200">Action</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($customers as $customer)
					<tr>
						<td valign="middle"><span class="fw-normal">{{ $loop->iteration }}</span></td>
						<td valign="middle">
							<span class="fw-normal">{{ $customer->first_name . ' ' . $customer->last_name }}</span>
						</td>
						<td valign="middle"><span class="fw-normal">{{ $customer->email }}</span></td>
						<td valign="middle"><span class="fw-normal">{{ $customer->phone_number }}</span></td>
						<td valign="middle">
							<a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-pill btn-outline-tertiary">Edit</a>
							<button type="button" class="btn btn-sm btn-pill btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-delete">Delete</button>
						</td>
					</tr>
				@empty
					<tr class="text-center">
						<td colspan="5">No data.</td>
					</tr>
				@endforelse

			</tbody>
		</table>

		<div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">

			{{-- pagination --}}
			{{ $customers->links('vendor.pagination.bootstrap-5') }}

		</div>

	</div>

	{{-- modal --}}
	<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<form action="{{ route('customers.destroy', $customer) }}" method="POST">

					@csrf
					@method('DELETE')

					<div class="modal-header">
						<h2 class="h6 modal-title">Confirmation</h2>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p>Are you sure you want to delete this customer?</p>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-danger">Yes</button>
						<button type="button" class="btn btn-outline-tertiary ms-auto" data-bs-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</x-app-layout>
