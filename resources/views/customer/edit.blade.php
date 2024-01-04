<x-app-layout>

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
		<div class="d-block mb-md-0">
			<h2 class="h4">Add Customer</h2>
		</div>
	</div>

	<div class="row mb-4">
		<div class="col-12 col-xl-8">

			<div class="card card-body border-0 shadow mb-4">
				<h2 class="h5 mb-4">Customer information</h2>

				<form method="POST" action="{{ route('customers.update', $customer) }}">

					@csrf

					@method('PUT')
					<div class="row">
						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="name">First Name</label>
								<input class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" type="text" placeholder="First Name" value="{{ old('first_name', $customer->first_name) }}" required>
								@error('first_name')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="name">First Name</label>
								<input class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" type="text" placeholder="Last Name" value="{{ old('last_name', $customer->last_name) }}" required>
								@error('last_name')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="email">Email</label>
								<input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" placeholder="Email" value="{{ old('email', $customer->email) }}" required>
								@error('email')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="phone_number">Phone Number</label>
								<input class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" type="number" placeholder="Phone Number" value="{{ old('phone_number', $customer->phone_number) }}" required>
								@error('phone_number')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="address">Address</label>
								<input class="form-control @error('address') is-invalid @enderror" id="address" name="address" type="text" placeholder="Address" value="{{ old('address', $customer->address) }}" required>
								@error('address')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>
					</div>

					<div class="mt-3">
						<button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save</button>
						<a href="{{ route('customers.index') }}" class="btn btn-secondary mt-2 animate-up-2" type="button">Cancel</a>
					</div>

				</form>

			</div>

		</div>
	</div>
</x-app-layout>
