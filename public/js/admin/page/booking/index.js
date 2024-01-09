$(function () {
	// holds the id when button click
	let this_id;
	// modals
	let checkinModal = $('#checkin-booking-modal');
	let checkoutModal = $('#checkout-booking-modal');


	// start => datatable
	let table = $("#booking-table").DataTable({
		autoWidth: false,
		responsive: true,
		processing: true,
		serverSide: true,
		searching: true,
		paging: true,
		ajax: {
			method: "GET",
			url: "/bookings/table",
			dataType: "json",
			error: function (errors) {
				toast.fire({
					icon: 'error',
					title: 'Invalid Data Token.',
				})
			},
		},
		language: {
			searchPlaceholder: "Search Records..",
		},
		columns: [
			{ data: "booking_code", name: "bookings.code" },
			{ data: "code", name: "reservations.code" },
			{ data: "created_at", name: "bookings.created_at" },
			{ data: "status", name: "bookings.status" },
			{
				data: "action",
				name: "action",
				orderable: false,
				searchable: false,
			},
		],
	});
	// end
	// custom search
	$("#custom-search-field").keyup(function () {
		table.search($(this).val()).draw();
	});
	// custom page length
	$("#custom-page-length").change(function () {
		table.page.len($(this).val()).draw();
	}).trigger('change');

	// start => button checkin
	$('body').on('click', '.checkin-booking', function () {
		this_id = $(this).attr('data-id');
		checkinModal.modal('show');
	});
	// end

	//start => modal button checkin
	$('body').on('click', '#checkin-booking', function () {
		$.ajax({
			type: 'PUT',
			url: '/bookings/checkin/' + this_id,
			dataType: 'json',
			beforeSend: function () {
				buttons('checkin-booking', 'start');
			}
		})
			.done(function (response) {
				table.ajax.reload();
				toast.fire({
					icon: 'success',
					title: response.message,
				});
			})
			.fail(function (jqXHR, textStatus, errorThrown) {
				toast.fire({
					icon: 'error',
					title: jqXHR.responseJSON.message,
				});
			})
			.always(function (jqXHROrData, textStatus, jqXHROrErrorThrown) {
				buttons('checkin-booking', 'finish');
				checkinModal.modal('hide');
			});
	});
	// end

	// start => button checkout
	$('body').on('click', '.checkout-booking', function () {
		this_id = $(this).attr('data-id');
		checkoutModal.modal('show');
	});
	// end

	//start => modal button checkout
	$('body').on('click', '#checkout-booking', function () {
		$.ajax({
			type: 'PUT',
    	url: '/bookings/checkout/' + this_id,
    	dataType: 'json',
    	beforeSend: function () {
        buttons('checkout-booking', 'start');
			}
		})
		.done(function (response) {
			table.ajax.reload();
			toast.fire({
				icon: 'success',
				title: response.message,
			});
		})
		.fail(function (jqXHR, textStatus, errorThrown) {
			toast.fire({
				icon: 'error',
				title: jqXHR.responseJSON.message,
			});
		})
		.always(function (jqXHROrData, textStatus, jqXHROrErrorThrown) {
			buttons('checkout-booking', 'finish');
			checkoutModal.modal('hide');
		});
	});
	// end
});
