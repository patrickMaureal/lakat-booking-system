<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="theme-color" content="#ffffff">

		@env('local')
			<meta name="robots" content="noindex, nofollow">
		@endenv

		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>{{ config('app.name', 'Laravel') }}</title>

		{{-- Volt CSS --}}
    <link type="text/css" rel="stylesheet" href="{{ asset('theme/volt/volt.css') }}">

		{{-- Bootstrap icons --}}
		<link type="text/css" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

		{{-- Fontawesome icons --}}
		<link type="text/css" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

		{{-- livewire --}}
		@livewireStyles

		{{-- page specific styles --}}
		@stack('styles')

	</head>

	<body>

		<main id="main">

      {{ $slot }}

		</main>

    {{-- livewire --}}
    @livewireScripts

    {{-- popper for dropdowns --}}
    <script type="text/javascript" src="{{ asset('vendor/@popperjs/popper.min.js') }}"></script>

		{{-- jquery --}}
		<script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

		{{-- bootstrap --}}
		<script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

		{{-- Smooth scroll --}}
		<script src="{{ asset('vendor/smooth-scroll/smooth-scroll.min.js') }}"></script>

		{{-- sweetalert --}}
		<script type="text/javascript" src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
		@include('sweetalert::alert')

		{{-- Volt JS --}}
    <script type="text/javascript" src="{{ asset('theme/volt/volt.js') }}"></script>
		<script type="text/javascript" src="{{ asset('theme/volt/custom.js') }}"></script>

		@stack('scripts')

	</body>

</html>
