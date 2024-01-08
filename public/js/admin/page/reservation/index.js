$(function () {
	// holds the id when button click
	let this_id;
	// modals
	let confirmModal = $('#confirm-reservation-modal');
	let cancelModal = $('#cancel-reservation-modal');
	let revertModal = $('#revert-reservation-modal');

	// start => datatable
	let table = $("#reservation-table").DataTable({
		autoWidth: false,
		responsive: true,
		processing: true,
		serverSide: true,
		searching: true,
		paging: true,
		ajax: {
			method: "GET",
			url: "/reservations/table",
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
			{ data: "code", name: "code" },
			{ data: "created_at", name: "created_at" },
			{ data: "checkin_date", name: "checkin_date" },
			{ data: "checkout_date", name: "checkout_date" },
			{ data: "status", name: "status" },
			{ data: "payment_status", name: "payment_status" },
			{ data: "accommodation_amount", name: "accommodation_amount" },

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

	// start => button cancel
	$('body').on('click', '.cancel-reservation', function () {
		this_id = $(this).attr('data-id');
		cancelModal.modal('show');
	});
	// end

	//start => modal button cancel
	$('body').on('click', '#cancel-reservation', function () {
		$.ajax({
			type: 'PUT',
			url: '/reservations/cancel/' + this_id,
			dataType: 'json',
			beforeSend: function () {
				buttons('cancel-reservation', 'start');
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
				buttons('cancel-reservation', 'finish');
				cancelModal.modal('hide');
			});
	});
	// end

	// start => button revert
	$('body').on('click', '.revert-reservation', function () {
		this_id = $(this).attr('data-id');
		revertModal.modal('show');
	});
	// end

	//start => modal button revert
	$('body').on('click', '#revert-reservation', function () {
		$.ajax({
			type: 'PUT',
    	url: '/reservations/revert/' + this_id,
    	dataType: 'json',
    	beforeSend: function () {
        buttons('revert-reservation', 'start');
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
			buttons('revert-reservation', 'finish');
			revertModal.modal('hide');
		});
	});
	// end
});
