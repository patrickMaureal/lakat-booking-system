<div>
  <div class="col-12 d-flex align-items-center justify-content-center">
		<div class="bg-gray-100 shadow border-0 rounded-bottom border-light p-4 p-lg-5 w-100">
			<div class="text-center text-md-center mb-4 mt-md-0">
				<h1 class="mb-0 h3">Contact Information</h1>
			</div>

			<div class="card border-0 shadow">
				<div class="card-body">
					<div class="row mb-4">
						<div class="col-12 col-xl-12">
							<form wire:submit="store">

								<div class="row">
									<div class="col-md-6 mb-3">
										<div class="form-group">
											<label for="name">First Name</label>
											<input class="form-control @error('first_name') is-invalid @enderror" id="first_name" type="text" placeholder="First Name" wire:model="first_name" required>
											@error('first_name')
												<div class="invalid-feedback">
													{{ $message }}
												</div>
											@enderror
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<div class="form-group">
											<label for="name">Last Name</label>
											<input class="form-control @error('last_name') is-invalid @enderror" id="last_name" type="text" placeholder="Last Name" wire:model="last_name" required>
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
											<input class="form-control @error('email') is-invalid @enderror" id="email" type="email" placeholder="Email" wire:model="email" required>
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
											<input class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" type="number" placeholder="Phone Number" wire:model="phone_number" required>
											@error('phone_number')
												<div class="invalid-feedback">
													{{ $message }}
												</div>
											@enderror
										</div>
									</div>
								</div>

								<div class="mt-3">
									<button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save</button>
								</div>

							</form>

							<div class="mt-5">
								<button type="button" class="btn btn-gray-800" wire:click="previousStep">Previous</button>
								<button type="button" class="btn btn-gray-800" wire:click="nextStep">Next</button>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
