<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">

	<title>{{ config('app.name', 'Lakat Beach Booking System') }}</title>

	{{-- Volt CSS --}}
	<link type="text/css" href="{{ asset('theme/volt/volt.css') }}" rel="stylesheet">
	<link type="text/css" href="{{ asset('theme/volt/custom.css') }}" rel="stylesheet">

	{{-- Bootstrap icons --}}
	<link type="text/css" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

	{{-- datatable --}}
	<link type="text/css" rel="stylesheet" href="{{ asset('vendor/bootstrap-datatables/bootstrap-datatable.min.css') }}">

	{{-- bootstrap-select --}}
	<link type="text/css" rel="stylesheet" href="{{ asset('vendor/bootstrap-select/bootstrap-select.min.css') }}">

	{{-- glightbox --}}
	<link type="text/css" rel="stylesheet" href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}">

	@stack('styles')

</head>

<body>

	@include('layouts.partials.admin.sidebar')

	<main class="content">

		@include('layouts.partials.admin.navbar')

		{{-- page content --}}
		{{ $slot }}

		{{-- footer --}}
		@include('layouts.partials.admin.footer')

	</main>

	@vite('resources/js/app.js')

	{{-- popper for dropdowns --}}
	<script type="text/javascript" src="{{ asset('vendor/@popperjs/popper.min.js') }}"></script>

	{{-- jquery --}}
	<script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

	{{-- bootstrap --}}
	<script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

	{{-- datatables --}}
	<script type="text/javascript" src="{{ asset('vendor/bootstrap-datatables/jquery.datatables.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('vendor/bootstrap-datatables/bootstrap-datatables.min.js') }}" ></script>

	{{-- Smooth scroll --}}
	<script type="text/javascript" src="{{ asset('vendor/smooth-scroll/smooth-scroll.min.js') }}"></script>

	{{-- sweetalert --}}
	<script type="text/javascript" src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
	@include('sweetalert::alert')

	{{-- glightbox --}}
  <script type="text/javascript" src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>

	{{-- bootstrap-select --}}
  <script type="text/javascript" src="{{ asset('vendor/bootstrap-select/bootstrap-select.min.js') }}"></script>

	{{-- Volt JS --}}
	<script src="{{ asset('theme/volt/volt.js') }}"></script>
	<script src="{{ asset('theme/volt/custom.js') }}"></script>

	{{-- Page Specific Scripts --}}
	@stack('scripts')
</body>

</html>
