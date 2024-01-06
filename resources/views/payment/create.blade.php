<x-app-layout>
  {{-- Header --}}
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-md-0">
      <h2 class="h4">Add Payment</h2>
    </div>
  </div>
  {{-- card body --}}
  <div class="row mb-4">
    <div class="col-12 col-xl-4">
      <div class="card card-body border-0 shadow mb-4">
        <h2 class="h5 mb-4">Payment Information</h2>
        <form method="POST" action="{{ route('payments.store') }}">
          @csrf
          <div class="row py-2">
            <div class="col-md-12 mb-3">
              <div class="form-group">
                <label for="booking">Booking <x-asterisks /> </label>
								<select name="booking" id="booking" class="form-control selectpicker @error('booking') is-invalid @enderror" required  data-live-search="true" title="Choose Booking">
									@foreach ($bookings as $booking)
										<option value="{{ $booking->id }}">{{ $booking->code }}</option>
									@endforeach
								</select>
                @error('booking')
                	<x-input-error message="{{ $message }}" />
                @enderror
              </div>
            </div>
            <div class="col-md-12 mb-3">
              <div class="form-group">
                <label for="amount">Amount <x-asterisks /> </label>
                <input class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" type="number" placeholder="Amount" value="{{ old('amount') }}">
                @error('amount')
                <x-input-error message="{{ $message }}" />
                @enderror
              </div>
            </div>

          </div>

          <div class="mt-3">
            <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save</button>
            <a href="{{ route('payments.index') }}" button class="btn btn-gray-800 mt-2 animate-up-2" type="button">Back</button></a>
          </div>

        </form>
      </div>
    </div>
  </div>

</x-app-layout>
