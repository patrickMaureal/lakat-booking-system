<div>
	<div>

		{{-- @include('components.booking-wizard-navigation') --}}

		<div class="col-12 d-flex align-items-center justify-content-center">
			<div class="bg-gray-100 shadow border-0 rounded-bottom border-light p-4 p-lg-5 w-100">
				<div class="text-center text-md-center mb-4 mt-md-0">
					<h1 class="mb-0 h3">Booking Date</h1>
				</div>

				<div class="card border-0 shadow">
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<label for="from_date">CHECK-IN:</label>
								<div class="input-group">
									<span class="input-group-text">
										<i class="bi bi-calendar"></i>
									</span>
									<input class="form-control datepicker-input id="from_date"
										type="date" placeholder="yyyy-mm-dd" name="from_date"
										wire:model.live="from_date" min="{{ $min_date }}" max="{{ $checkout_date }}" required>
								</div>
							</div>

							<div class="col-md-6">
								<label for="to_date">CHECK-OUT:</label>
								<div class="input-group">
									<span class="input-group-text">
										<i class="bi bi-calendar"></i>
									</span>
									<input class="form-control datepicker-input id="to_date"
										type="date" placeholder="yyyy-mm-dd" name="to_date"
										wire:model.live="to_date" min="{{ $checkin_date }}" max="{{ $max_date }}" required>
								</div>
							</div>

							@if ($checkin_date != null && $checkout_date != null)
								<div class="table-responsive">
									<table class="table table-centered table-nowrap mt-5 rounded">
										<thead class="thead-light">
											<tr>
												<th class="border-0 rounded-start">CHECK-IN:</th>
												<th class="border-0">CHECK-OUT:</th>
												<th class="border-0 rounded-end"># of Day/s</th>
											</tr>
										</thead>
										<tbody>
												<tr>
													<td>
														<a class="small fw-bold">{{ $checkin_date }}</a>
													</td>
													<td>
														<a class="small fw-bold">{{ $checkout_date }}</a>
													</td>
													<td>
														<a class="small fw-bold">{{ $total_days }} day/s</a>
													</td>
												</tr>
										</tbody>
									</table>
								</div>

								<div class="mt-3">
									<button type="button" class="btn btn-gray-800" wire:click="nextStep">Next</button>
								</div>

							@endif

						</div>
					</div>
				</div>

			</div>
		</div>

		@push('scripts')
			<script>

				window.addEventListener('close-booking-confirmation-modal', event => {
					$('#bookingConfirmationModal').modal('hide');
				});


				window.addEventListener('alert', event => {
					toast.fire({
						icon: event.detail.type,
						title: event.detail.message ?? '',
					});
				});

				window.addEventListener('swal', event => {
					Swal.fire({
						allowOutsideClick: false,
						title: event.detail.title ?? '',
						text: event.detail.text ?? '',
						icon: event.detail.type,
					})
					.then((result) => {
						if (result.isConfirmed) {
							window.location.href = event.detail.url
						}
					});
				});

			</script>
		@endpush
	</div>

</div>
