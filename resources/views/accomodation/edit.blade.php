<x-app-layout>

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
		<div class="d-block mb-md-0">
			<h2 class="h4">Update Accomodation</h2>
		</div>
	</div>

	<div class="row mb-4">
		<div class="col-12 col-xl-8">

			<div class="card card-body border-0 shadow mb-4">
				<h2 class="h5 mb-4">Accomodation information</h2>

				<form method="POST" action="{{ route('accomodations.update', $accomodation) }}" enctype="multipart/form-data">

					@csrf

					@method('PUT')

					<div class="row">

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="availability">Availability
									<x-asterisks />
								</label>
								<select class="form-control form-select selectpicker @error('availability') is-invalid @enderror" id="availability" name="availability"
                  type="text" aria-label="availability" data-live-search="true" title="Choose availability" required>
                  <option value="0" {{ $accomodation->availability ? 'selected' : '' }}>Yes</option>
									<option value="1" {{ !$accomodation->availability ? 'selected' : '' }}>No</option>
                </select>
                @error('availability')
                <x-input-error message="{{ $message }}" />
                @enderror
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="name">Name
									<x-asterisks />
								</label>
								<input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="Accomodation Name" value="{{ old('name', $accomodation->name) }}" required>
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
								<input class="form-control @error('min_capacity') is-invalid @enderror" id="min_capacity" name="min_capacity" type="number" placeholder="0" value="{{ old('min_capacity', $accomodation->min_capacity) }}" required>
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
								<input class="form-control @error('max_capacity') is-invalid @enderror" id="max_capacity" name="max_capacity" type="number" placeholder="0" value="{{ old('max_capacity', $accomodation->max_capacity) }}" required>
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
								<input class="form-control @error('total_occupied') is-invalid @enderror" id="total_occupied" name="total_occupied" type="number" placeholder="0" value="{{ old('total_occupied', $accomodation->total_occupied) }}" required>
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

								<input class="form-control @error('price') is-invalid @enderror" id="price" name="price" type="number" placeholder="Price" value="{{ old('price', $accomodation->price) }}" required>
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
										name="cover_photo" type="file" placeholder="Cover Photo">
									@error('cover_photo')
										<x-input-error message="{{ $message }}" />
									@enderror
								</div>
							</div>
						</div>
					</div>

					<div class="mt-3">
						<button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save</button>
						<a href="{{ route('accomodations.index') }}" class="btn btn-secondary mt-2 animate-up-2" type="button">Cancel</a>
					</div>

				</form>

			</div>

			<div class="card card-body border-0 shadow mb-4">
				<h2 class="h5 mb-4">Accomodation Photo</h2>
				<section id="gallery" class="gallery">
					<div class="container-fluid">
						<div class="row gy-4 justify-content-center">
							@foreach ($accomodation->getMedia('cover_photos') as $media)
								<div class="col-xl-3 col-lg-4 col-md-6">
									<div class="gallery-item h-100">
										<img src="{{ $media->getUrl() }}" class="img-fluid" alt="">
										<div class="gallery-links d-flex align-items-center justify-content-center">
											<a href="{{ $media->getUrl() }}" title="{{ $media->name }}" class="glightbox preview-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-angle-expand" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"/>
											</svg></a>
											<a href="#" class="delete-accomodation-attachment details-link" data-id="{{ $media->uuid }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
												<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
												<path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
											</svg></a>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</section>
			</div>

		</div>
	</div>

	{{-- modal --}}
	<x-modal modal-id="accomodation-attachment-modal" button-id="destroy-accomodation-attachment" type="delete" label="Accomodation" />

	@push('styles')
			<link rel="stylesheet" href="{{ asset('css/page/accomodation/image-gallery.css') }}">
	@endpush


	@push('scripts')
		<script type="text/javascript" src="{{ asset('js/admin/page/accomodation/image-gallery.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/admin/page/accomodation/edit.js') }}"></script>
	@endpush
</x-app-layout>
