<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Reservation Receipt</title>
		<style>
			* {
				font-family: "DejaVu Sans", Arial, Helvetica, sans-serif;
				font-size: 0.7rem;
			}

			/** Define the margins of your page **/
			@page {
				margin: 150px 0.5in 0.5in 0.5in;
			}

			.main {
				padding-top: 0px;
				margin-top: -50px;
			}

			.header {
				position: fixed;
				top: -120px;
				left: 0px;
				right: 0px;
				height: -120px;
			}

			.page-break {
				page-break-after: always;
			}

			#header-table {
				border-collapse: collapse;
				width: 100%;
			}

			#qrcode-table {
				border-collapse: collapse;
				width: 100%;
			}

			#schedule-table {
				border-collapse: collapse;
				width: 100%;
			}

			#contact-table {
				border-collapse: collapse;
				width: 100%;
			}

			#note-table {
				border-collapse: collapse;
				width: 100%;
			}

			#accomodation-table {
				border-collapse: collapse;
				width: 100%;
			}

			#qrcode-table td {
				padding: 3px;
			}

			#schedule-table td {
				padding: 3px;
			}

			#contact-table td {
				padding: 3px;
			}

			#note-table td {
				padding: 3px;
			}

			h3 {
				font-size: 1.25rem;
			}

		</style>

	</head>

	<body>
		<main>

			{{--
				- I use this, instead of <header></header>
				- better approach to exclude header on page 2
			--}}
			<div class="header">
				<table border="0" cellspacing="0" cellpadding="0" style="width: 100%">
					<tr>
						<td>
							<strong style="font-size:1.3rem;">LAKAT BALAS BEACH ADVENTURE CAMP</strong>
						</td>
						<td rowspan="4" style="width: 8%;">
							<img src="{{ asset('img/lakat-balas-logo.jpg') }}" alt="" height="50px">
						</td>
					</tr>
					<tr>
						<td>
							Barangay Owak Asturias, Cebu City, Philippines
						</td>
					</tr>
					<tr>
						<td>
							Contact no: +6391-763-74872
						</td>
					</tr>
					<tr>
						<td>
							Email: <a href="mailto:allansaballa@gmail.com">allansaballa@gmail.com</a> Facebook: <a href="www.facebook.com/lakatbalas/">www.facebook.com/lakatbalas/</a>
						</td>
					</tr>
				</table>
			</div>

			<div class="main">

				<h1 style="text-align: center;font-size: 1.2rem;padding-top:50px;">Reservation Receipt</h1>
				<table border="0" id="qrcode-table">
					<tbody>
						<tr>
							<td>
								<h2>Booking Code: <span style="font-weight: lighter">{{ $booking['code'] }}</span></h2>
								<h2>Booking Created: <span style="font-weight: lighter">{{ $booking['created_at'] }}</span></h2>
							</td>
							<td style="text-align:right;">
								<img src="data:image/svg+xml;base64,{{ $bookingQrCode }}" alt="Booking Qr Code">
							</td>
						</tr>
					</tbody>
				</table>

				<table border="1" style="width: 100%;border-collapse: collapse;padding-top:15px;">
					<tbody>
						<table border="0" id="schedule-table">
							<thead>
								<tr>
									<th colspan="3" style="font-size: 1.0rem;">Schedule</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><b>Booking Date:</b> <br> {{ $schedule['checkin_date'] }} - {{ $schedule['checkout_date'] }}</td>
									<td><b>Total Day/s:</b> <br> {{ $schedule['total_days'] }}</td>
								</tr>
							</tbody>
						</table>
					</tbody>
				</table>


				<table border="1" style="width: 100%;border-collapse: collapse;padding-top:15px;">
					<tbody>
						<table border="0" id="accomodation-table">
							<thead>
								<tr>
									<th colspan="3" style="font-size: 1.0rem;">Accomodation</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><b>Name:</b> <br> {{ $accomodation->name }}</td>
									<td><b>Price:</b> <br> {{ $accomodation->price }}</td>
								</tr>
							</tbody>
						</table>
					</tbody>
				</table>


				<table border="1" style="width: 60%;border-collapse: collapse;padding-top:15px;">
					<tbody>
						<table border="0" id="contact-table">
							<thead>
								<tr>
									<th colspan="2" style="font-size: 1.0rem;text-align: center">Contact Information</th>
								</tr>
							</thead>
							<tbody>
								@foreach($contactInformations as $contact)
									<tr>
										<td><b>Name:</b> <br> {{ $contact['first_name'] }} {{ $contact['last_name'] }}</td>
										<td><b>Email:</b> <br> {{ $contact['email'] }}</td>
										<td><b>Phone Number:</b> <br> {{ $contact['phone_number'] }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</tbody>
				</table>


				<table border="0" style="width: 60%;border-collapse: collapse;padding-top:15px; margin-top: 1.5rem">
					<tbody>
						<table border="0" id="note-table">
							<thead>
								<tr>
									<th colspan="2" style="font-size: 1.0rem;text-align: Left">NOTE:</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><h2>Thank you for choosing Lakat. We Will Email You to Confirm your Reservation</h2></td>
								</tr>
							</tbody>
						</table>
					</tbody>
				</table>

			</div>

		</main>
	</body>

</html>
