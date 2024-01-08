<x-app-layout>
	<div class="col-12 d-flex align-items-center justify-content-center">
		<div class="bg-gray-100 shadow border-0 rounded border-light p-4 p-lg-5 w-100">
			<div class="text-center text-md-center mb-4 mt-md-0">
				<h1 class="mb-0 h3">Reservation Details</h1>
			</div>

			<div class="card border-0 shadow rounded mb-4">
				<div class="card-header border-bottom d-flex align-items-center justify-content-between">
					<h2 class="fs-5 mb-0">Schedule</h2>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12 col-xl-12">
							<ul class="list-group list-group-flush">
								<li class="list-group-item align-items-center justify-content-between px-0 border-bottom">
									<div class="row">
										<div class="col-md-4">
											<div>
												<h3 class="h6 mb-1">Reservation Date</h3>
												<p class="small pe-4">{{ $schedule['checkin_date'] }} - {{ $schedule['checkout_date'] }}</p>
											</div>
										</div>
										<div class="col-md-4">
											<div>
												<h3 class="h6 mb-1">Total day/s</h3>
												<p class="small pe-4">{{ $schedule['total_days'] }}</p>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="card border-0 shadow rounded mb-4">
				<div class="card-header border-bottom d-flex align-items-center justify-content-between">
					<h2 class="fs-5 mb-0">Accomodation</h2>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12 col-xl-7 text-center">
							<div class="text-center h-75 my-0 my-md-4">
								@php
									$accomodationCoverPhoto = $accomodation->getMedia('cover_photos')[0];
								@endphp
								<img src="{{ $accomodationCoverPhoto->getUrl() }}" class="text-center w-75 h-75" alt="">
							</div>
						</div>
						<div class="col-md-12 col-xl-5">
							<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
									<div>
										<h3 class="h6 mb-1">Name</h3>
										<p class="large pe-4">{{ $accomodation->name }}</p>
									</div>
								</li>
							</ul>
							<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
									<div>
										<h3 class="h6 mb-1">Capacity</h3>
										<p class="small pe-4">{{ $accomodation->min_capacity }} - {{ $accomodation->max_capacity }} Person/s</p>
									</div>
								</li>
							</ul>
							<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
									<div>
										<h3 class="h6 mb-1">Minimum Stay</h3>
										<p class="small pe-4">{{ $accomodation->min_stay }} Night/s</p>
									</div>
								</li>
							</ul>
							<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
									<div>
										<h3 class="h6 mb-1">Price</h3>
										<p class="small pe-4">{{ $accomodation->price }}</p>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="card border-0 shadow rounded mb-4">
				<div class="card-header border-bottom d-flex align-items-center justify-content-between">
					<h2 class="fs-5 mb-0">Contact Information</h2>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-centered table-nowrap mb-7 rounded border">
							<thead class="thead-light">
								<tr>
									<th class="border-0 rounded-start">First Name</th>
									<th class="border-0">Last Name</th>
									<th class="border-0">Email</th>
									<th class="border-0 rounded-end">Phone Number</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($contactInformations as $customer)
									<tr>
										<td>
											<a class="small fw-bold">{{ $customer['first_name'] }}</a>
										</td>

										<td>
											<a class="small fw-bold">{{ $customer['last_name'] }}</a>
										</td>

										<td>
											<a class="small fw-bold">{{ $customer['email'] }}</a>
										</td>

										<td>
											<a class="small fw-bold">{{ $customer['phone_number'] }}</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>



		</div>
	</div>
</x-app-layout>
