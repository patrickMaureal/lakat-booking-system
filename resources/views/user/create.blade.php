<x-app-layout>

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
		<div class="d-block mb-md-0">
			<h2 class="h4">Add User</h2>
		</div>
	</div>

	<div class="row mb-4">
		<div class="col-12 col-xl-8">

			<div class="card card-body border-0 shadow mb-4">
				<h2 class="h5 mb-4">User information</h2>

				<form method="POST" action="{{ route('users.store') }}">
					@csrf

					<div class="row">
						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="name">Name</label>
								<input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="Name" value="{{ old('name') }}" required>
								@error('name')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="username">Username</label>
								<input class="form-control @error('username') is-invalid @enderror" id="username" name="username" type="text" placeholder="Username" value="{{ old('username') }}" required>
								@error('username')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="role">User Role</label>
								<select class="form-select @error('role') is-invalid @enderror" id="role" name="role" placeholder="Role" value="{{ old('role') }}" required>
									<option value="Administrator">Administrator</option>
									<option value="Guest">Guest</option>
								</select>
								@error('role')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="email">Email</label>
								<input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" placeholder="Email" value="{{ old('email') }}" required>
								@error('email')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="contact_number">Contact Number</label>
								<input class="form-control @error('contact_number') is-invalid @enderror" id="contact_number" name="contact_number" type="number" value="{{ old('contact_number') }}" required>
								@error('contact_number')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="password">Password</label>
								<input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" placeholder="Password" required>
								@error('password')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="password_confirmation">Confirm Password</label>
								<input class="form-control" id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm Password" >
							</div>
						</div>

					</div>

					<div class="mt-3">
						<button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save</button>
					</div>

				</form>

			</div>

		</div>
	</div>
</x-app-layout>
