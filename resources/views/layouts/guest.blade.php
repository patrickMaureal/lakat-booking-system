<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>{{ config('app.name', 'Laravel') }}</title>

		{{-- Volt CSS --}}
		<link type="text/css" href="{{ asset('theme/volt/volt.css') }}" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="{{ asset('theme/volt/custom.css') }}">

		{{-- Bootstrap icons --}}
		<link type="text/css" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

		{{-- bootstrap-select --}}
		<link type="text/css" rel="stylesheet" href="{{ asset('vendor/bootstrap-select/bootstrap-select.min.css') }}">

	</head>

	<body>

		<main>

			{{-- Section --}}
			<section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
				<div class="container">
					<p class="text-center">
						<a href="{{ url('/') }}" class="d-flex align-items-center justify-content-center">
							<i class="icon icon-sm me-2 bi bi-arrow-left"></i>
							Back to homepage
						</a>
					</p>
					<div class="row justify-content-center form-bg-image" data-background-lg="{{ asset('img/volt/illustrations/signin.svg') }}">
						<div class="col-12 d-flex align-items-center justify-content-center">
							<div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
								{{ $slot }}
							</div>
						</div>
					</div>
				</div>
			</section>

		</main>

		@vite('resources/js/app.js')

		{{-- Core --}}
		<script type="text/javascript" src="{{ asset('vendor/@popperjs/popper.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>


		{{-- Smooth scroll --}}
		<script type="text/javascript" src="{{ asset('vendor/smooth-scroll/smooth-scroll.min.js') }}"></script>

		{{-- sweetalert --}}
		<script type="text/javascript" type="text/javascript" src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
		@include('sweetalert::alert')

		{{-- Smooth scroll --}}
		<script src="{{ asset('vendor/smooth-scroll/smooth-scroll.min.js') }}"></script>
		{{-- bootstrap-select--}}
		<script type="text/javascript" src="{{ asset('vendor/bootstrap-select/bootstrap-select.min.js') }}"></script>

		{{-- Volt JS --}}
		<script type="text/javascript" src="{{ asset('theme/volt/volt.js') }}"></script>
		<script type="text/javascript" src="{{ asset('theme/volt/custom.js') }}"></script>

	</body>

</html>
