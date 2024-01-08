<div>
	@push('styles')
		<link href="{{ asset('theme/page/accomodation/custom.css') }}" rel="stylesheet" type="text/css">
	@endpush
	<!-- ======= Services Section ======= -->
		<section id="services" class="services">
			<div class="container" data-aos="fade-up">

				<div class="section-header">
					<h2>Our Accomodations</h2>
					<p>At Lakat Balas Beach Adventure Camp, our accommodations blend rustic charm with modern amenities for a memorable stay.</p>
				</div>

				<div class="row gy-5">

					<div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
						<div class="service-item">
							<div class="img">
								<img src="{{ asset('img/lakat-balas/accomodations/Glamping-A-Hut.png') }}" class="img-fluid" alt="">
							</div>
							<div class="details position-relative">
								<div class="icon">
									<i class="bi bi-activity"></i>
								</div>
								<a href="{{ route('booking.index') }}" class="stretched-link">
									<h3>Glamping/A Hut</h3>
								</a>
								<p>Experience nature's charm in our luxurious glamping hut—a blend of rustic allure and modern comfort.</p>
								<button class="btn-getstarted">Book Now</button>
							</div>
						</div>
					</div><!-- End Service Item -->

					<div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
						<div class="service-item">
							<div class="img">
								<img src="{{ asset('img/lakat-balas/accomodations/family-tent.jpg') }}" class="img-fluid" alt="">
							</div>
							<div class="details position-relative">
								<div class="icon">
									<i class="bi bi-broadcast"></i>
								</div>
								<a href="{{ route('booking.index') }}" class="stretched-link">
									<h3>Family Tent</h3>
								</a>
								<p>Spacious and cozy, our family tent offers a comfortable retreat in nature, perfect for bonding and adventure.</p>
								<button class="btn-getstarted">Book Now</button>
							</div>
						</div>
					</div><!-- End Service Item -->

					<div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
						<div class="service-item">
							<div class="img">
								<img src="{{ asset('img/lakat-balas/accomodations/lakat-tent.jpg') }}" class="img-fluid" alt="">
							</div>
							<div class="details position-relative">
								<div class="icon">
									<i class="bi bi-easel"></i>
								</div>
								<a href="{{ route('booking.index') }}" class="stretched-link">
									<h3>Lakat Tent</h3>

								</a>
								<p>A traditional yet modern shelter, offering comfort and cultural charm in the heart of nature.</p>
								<button class="btn-getstarted">Book Now</button>

							</div>
						</div>
					</div><!-- End Service Item -->

					<div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="500">
						<div class="service-item">
							<div class="img">
								<img src="{{ asset('img/lakat-balas/accomodations/car-camping.png') }}" class="img-fluid" alt="">
							</div>
							<div class="details position-relative">
								<div class="icon">
									<i class="bi bi-car-front"></i>
								</div>
								<a href="{{ route('booking.index') }}" class="stretched-link">
									<h3>Car Camping</h3>
								</a>
								<p>Unplug and unwind with the convenience of your vehicle, blending adventure and comfort seamlessly.</p>
								<button class="btn-getstarted">Book Now</button>
							</div>
						</div>
					</div><!-- End Service Item -->
				</div>

			</div>
		</section>
	<!-- End Services Section -->
</div>

