$(function () {
  // holds the id when button delete click
  let this_id;
  // modal
  let modal = $('#accomodation-modal');
	// start => datatable
	let table = $("#accomodation-table").DataTable({
		autoWidth: false,
		responsive: true,
		processing: true,
		serverSide: true,
		searching: true,
		paging: true,
		ajax: {
			method: "GET",
			url: "/accomodations/table",
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
			{ data: "name", name: "name" },
			{ data: "min_capacity", name: "min_capacity" },
			{ data: "max_capacity", name: "max_capacity" },
			{ data: "price", name: "price" },
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
  // start => button delete
	$('body').on('click', '.delete-accomodation', function () {
		this_id = $(this).attr('data-id');
		modal.modal('show');
	});
	// end
	//start => modal button delete
	$('body').on('click', '#destroy-accomodation', function () {
		$.ajax({
			type: 'DELETE',
			url: '/accomodations/' + this_id,
			dataType: 'json',
			beforeSend : function() {
				buttons('destroy-accomodation', 'start');
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
		.always(function (jqXHROrData, textStatus, jqXHROrErrorThrown){
			buttons('destroy-accomodation', 'finish');
			modal.modal('hide');
		});
	});
	// end
});
