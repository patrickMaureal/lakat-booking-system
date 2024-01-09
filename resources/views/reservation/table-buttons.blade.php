<div class="btn-group">
	<button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<span class="bi bi-three-dots"></span>
			<span class="visually-hidden">Toggle Dropdown</span>
	</button>
	<div class="dropdown-menu py-0">
		@if ($row['status'] === 'Pending')
			<a class="dropdown-item rounded-top" href="{{ route('reservations.show', $row['id']) }}"><span class="bi bi-pencil-fill me-2"></span>View Details</a>
			<button class="cancel-reservation dropdown-item text-danger rounded-bottom" data-id="{{ $row['id'] }}"><span class="bi bi-file-earmark-x-fill me-2"></span>Cancel</button>
		@else

			<a class="dropdown-item rounded-top" href="{{ route('reservations.show', $row['id']) }}"><span class="bi bi-pencil-fill me-2"></span>View Details</a>

			@if ($row['status'] === 'Confirmed')
				<button class="book-reservation dropdown-item text-warning rounded-bottom" data-id="{{ $row['id'] }}"><span class="bi bi-bookmark-check me-2"></span>Book</button>
			@else
				<button class="revert-reservation dropdown-item text-danger rounded-bottom" data-id="{{ $row['id'] }}"><span class="bi bi-file-earmark-x-fill me-2"></span>Revert</button>
			@endif

		@endif
	</div>
</div>
