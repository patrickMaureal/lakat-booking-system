$(function () {
  // holds the id when button delete click
  let this_id;
  // modal
  let modal = $('#customer-modal');
	// start => datatable
	let table = $("#customer-table").DataTable({
		autoWidth: false,
		responsive: true,
		processing: true,
		serverSide: true,
		searching: true,
		paging: true,
		ajax: {
			method: "GET",
			url: "/customers/table",
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
			{ data: "full_name", name: "full_name" },
			{ data: "email", name: "email" },
			{ data: "phone_number", name: "phone_number" },
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
	$('body').on('click', '.delete-customer', function () {
		this_id = $(this).attr('data-id');
		modal.modal('show');
	});
	// end
	//start => modal button delete
	$('body').on('click', '#destroy-customer', function () {
		$.ajax({
			type: 'DELETE',
			url: '/customers/' + this_id,
			dataType: 'json',
			beforeSend : function() {
				buttons('destroy-customer', 'start');
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
			buttons('destroy-customer', 'finish');
			modal.modal('hide');
		});
	});
	// end
});
