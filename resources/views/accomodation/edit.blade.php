<x-app-layout>

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
		<div class="d-block mb-md-0">
			<h2 class="h4">Add Accomodation</h2>
		</div>
	</div>

	<div class="row mb-4">
		<div class="col-12 col-xl-8">

			<div class="card card-body border-0 shadow mb-4">
				<h2 class="h5 mb-4">Accomodation information</h2>

				<form method="POST" action="{{ route('accomodations.update', $accomodation) }}">

					@csrf

					@method('PUT')

					<div class="row">
						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="name">Name</label>
								<input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="Accomodation Name" value="{{ old('name', $accomodation->name) }}" required>
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
								<input class="form-control @error('description') is-invalid @enderror" id="description" name="description" type="text" placeholder="Description" value="{{ old('description', $accomodation->description) }}" required>
								@error('description')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="min_capacity">Minimum Capacity</label>
								<input class="form-control @error('min_capacity') is-invalid @enderror" id="min_capacity" name="min_capacity" type="number" placeholder="0" value="{{ old('min_capacity', $accomodation->min_capacity) }}" required>
								@error('min_capacity')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="max_capacity">Maximum Capacity</label>
								<input class="form-control @error('max_capacity') is-invalid @enderror" id="max_capacity" name="max_capacity" type="number" placeholder="0" value="{{ old('max_capacity', $accomodation->max_capacity) }}" required>
								@error('max_capacity')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="price">Price</label>
								<input class="form-control @error('price') is-invalid @enderror" id="price" name="price" type="number" placeholder="Price" value="{{ old('price', $accomodation->price) }}" required>
								@error('price')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>

					</div>

					<div class="mt-3">
						<button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save</button>
						<a href="{{ route('accomodations.index') }}" class="btn btn-secondary mt-2 animate-up-2" type="button">Cancel</a>
					</div>

				</form>

			</div>

		</div>
	</div>
</x-app-layout>
