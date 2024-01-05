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

				<form method="POST" action="{{ route('accomodations.store') }}" enctype="multipart/form-data">
					@csrf

					<div class="row">
						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="name">Name
									<x-asterisks />
								</label>
								<input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="Accomodation Name" value="{{ old('name') }}" required>
								@error('name')
									<x-input-error message="{{ $message }}" />
								@enderror
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="min_capacity">Minimum Capacity
									<x-asterisks />
								</label>
								<input class="form-control @error('min_capacity') is-invalid @enderror" id="min_capacity" name="min_capacity" type="number" placeholder="0" value="{{ old('min_capacity') }}" required>
								@error('min_capacity')
									<x-input-error message="{{ $message }}" />
								@enderror
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="max_capacity">Maximum Capacity
									<x-asterisks />
								</label>
								<input class="form-control @error('max_capacity') is-invalid @enderror" id="max_capacity" name="max_capacity" type="number" placeholder="0" value="{{ old('max_capacity') }}" required>
								@error('max_capacity')
									<x-input-error message="{{ $message }}" />
								@enderror
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="total_occupied">Total Occupancy
									<x-asterisks />
								</label>
								<input class="form-control @error('total_occupied') is-invalid @enderror" id="total_occupied" name="total_occupied" type="number" placeholder="0" value="{{ old('total_occupied') }}" required>
								@error('total_occupied')
									<x-input-error message="{{ $message }}" />
								@enderror
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="price">Price
									<x-asterisks />
								</label>

								<input class="form-control @error('price') is-invalid @enderror" id="price" name="price" type="number" placeholder="Price" value="{{ old('price') }}" required>
								@error('price')
									<x-input-error message="{{ $message }}" />
								@enderror
							</div>
						</div>

						<div class="row mb-2 py-2">
							<div class="col-md-12">
								<div class="form-group">
									<label for="file">Upload cover photo:
										<x-asterisks />
									</label>
									<input class="form-control  @error('cover_photo') is-invalid @enderror" id="cover_photo"
										name="cover_photo" type="file" placeholder="Cover Photo" required>
									@error('cover_photo')
										<x-input-error message="{{ $message }}" />
									@enderror
								</div>
							</div>
						</div>
					</div>

					<div class="mt-3">
						<button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save</button>
						<a href="{{ route('accomodations.index') }}" class="btn btn-secondary mt-2 animate-up-2 ms-2">Cancel</a>
					</div>

				</form>

			</div>

		</div>
	</div>
</x-app-layout>
