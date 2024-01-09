<div class="btn-group">
	<button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<span class="bi bi-three-dots"></span>
			<span class="visually-hidden">Toggle Dropdown</span>
	</button>
	<div class="dropdown-menu py-0">
		@if ($row['status'] === 'Booked')
			<button class="checkin-booking dropdown-item text-success rounded-bottom" data-id="{{ $row['id'] }}"><span class="bi bi-check-circle-fill me-2"></span>Checkin</button>
		@else
			<button class="revert-booking dropdown-item text-warning rounded-bottom" data-id="{{ $row['id'] }}"><span class="bi bi-file-earmark-x-fill me-2"></span>Revert</button>
			<button class="checkout-booking dropdown-item text-danger rounded-bottom" data-id="{{ $row['id'] }}"><span class="bi bi-x-circle-fill me-2"></span>Checkout</button>
		@endif
	</div>
</div>
