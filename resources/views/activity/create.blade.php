<x-app-layout>

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
		<div class="d-block mb-md-0">
			<h2 class="h4">Add Activity</h2>
		</div>
	</div>

	<div class="row mb-4">
		<div class="col-12 col-xl-8">

			<div class="card card-body border-0 shadow mb-4">
				<h2 class="h5 mb-4">Activity information</h2>

				<form method="POST" action="{{ route('activities.store') }}">
					@csrf

					<div class="row">
						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="name">Name</label>
								<input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="Activity Name" value="{{ old('name') }}" required>
								@error('name')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="description">Description</label>
								<input class="form-control @error('description') is-invalid @enderror" id="description" name="description" type="text" placeholder="Description" value="{{ old('description') }}" required>
								@error('description')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="cost">Cost</label>
								<input class="form-control @error('cost') is-invalid @enderror" id="cost" name="cost" type="cost" placeholder="Cost" value="{{ old('cost') }}" required>
								@error('cost')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="quantity">Available Quantity</label>
								<input class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" type="number" placeholder="Available Quantity" value="{{ old('quantity') }}" required>
								@error('quantity')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>
					</div>

					<div class="mt-3">
						<button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save</button>
						<a href="{{ route('activities.index') }}" class="btn btn-secondary mt-2 animate-up-2" type="button">Cancel</a>
					</div>

				</form>

			</div>

		</div>
	</div>
</x-app-layout>
