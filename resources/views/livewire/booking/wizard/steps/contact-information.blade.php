<div>

	{{-- @include('components.booking-wizard-navigation') --}}

  <div class="col-12 d-flex align-items-center justify-content-center">
    <div class="bg-gray-100 shadow border-0 rounded border-light p-4 p-lg-5 w-100">
      <div class="text-center text-md-center mb-4 mt-md-0">
        <h1 class="mb-0 h3">Customer Information</h1>
      </div>

      <div class="card border-0 shadow">
        <div class="card-body">
					@if ( (count($customers) == 0) )
          <button type="button" class="btn btn-block btn-gray-800 mb-3" wire:click="add"> Add Customer Info</button>
					@endif
          <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-7 rounded">
              <thead class="thead-light">
                <tr>
                  <th class="border-0 rounded-start">First Name</th>
                  <th class="border-0">Last Name</th>
                  <th class="border-0">Email</th>
                  <th class="border-0">Phone Number</th>
                  <th class="border-0 rounded-end">Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($customers as $customer)
                  <tr>

										<td>
											<a class="fw-bold">{{ $customer['first_name'] }}</a>
										</td>

										<td>
											<a class="fw-bold">{{ $customer['last_name'] }}</a>
										</td>

										<td>
											<a class="fw-bold">{{ $customer['email'] }}</a>
										</td>

										<td>
											<a class="fw-bold">{{ $customer['phone_number'] }}</a>
										</td>

										<td>
											<div class="btn-group">
												<button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0"
													data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<span class="bi bi-three-dots-vertical"></span>
													<span class="visually-hidden">Toggle Dropdown</span>
												</button>
												<div class="dropdown-menu py-2">
													<button type="button" class="dropdown-item fw-bold" wire:click="edit('{{ $customer['id'] }}')">Edit</button>
													<button type="button" class="dropdown-item text-danger rounded-bottom fw-bold" wire:click="delete('{{ $customer['id'] }}')">Delete</button>
											</div>
										</td>
                  </tr>
                @empty
                  <tr class="text-center">
                    <td colspan="6">No record.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="mt-5">
        <button type="button" class="btn btn-gray-800" wire:click="previousStep">Previous</button>
        @if ( (count($customers) > 0) )
          <button type="button" class="btn btn-gray-800" wire:click="nextStep">Next</button>
        @endif
      </div>

    </div>
  </div>

  {{-- form --}}
	<div class="modal fade" data-backdrop="static" data-keyboard="false" id="customerFormModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
					<h5 class="modal-title">Customer Information</h5>
        </div>
        <form wire:submit="{{ ($id) ? 'update' : 'store' }}">

          <div class="modal-body">

						<div class="form-group mb-3">
							<label for="first_name">First Name <x-asterisks /></label>
							<input type="text" class="form-control" id="first_name" wire:model="first_name" required/>
						</div>

						<div class="form-group mb-3">
							<label for="last_name">Last Name <x-asterisks /></label>
							<input type="text" class="form-control" id="last_name" wire:model="last_name" required/>
						</div>

						<div class="form-group mb-3">
							<label for="email">Email <x-asterisks /></label>
							<input type="email" class="form-control" id="email" wire:model="email" required/>
						</div>

						<div class="form-group mb-3">
							<label for="phone_number">Phone <x-asterisks /></label>
							<input type="text" class="form-control" id="phone_number" wire:model="phone_number" required/>
						</div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">
              Close
            </button>
            <button type="submit" class="btn btn-secondary">Save</button>
          </div>

        </form>
      </div>
    </div>
  </div>

	{{-- delete modal --}}
	<div class="modal fade" data-backdrop="static" data-keyboard="false" id="customerDeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Delete Confirmation</h5>
					<span class="pull-right" wire:loading>
						<img src="{{ asset('img/spinner.gif') }}">
					</span>
				</div>
				<div class="modal-body" >
					<p>Delete Customer Information?</p>
				</div>
				<div class="modal-footer">
					<button type="button" id="close-button" data-bs-dismiss="modal" class="btn btn-outline-secondary"><i class="fas fa-window-close"></i> Close </button>
					<button type="button" wire:click="destroy" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i> Delete </button>
				</div>
			</div>
		</div>
	</div>

</div>
