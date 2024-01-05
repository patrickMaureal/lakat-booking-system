<div>

	{{-- @include('components.booking-wizard-navigation') --}}

	<div class="col-12 d-flex align-items-center justify-content-center">
		<div class="bg-gray-100 shadow border-0 rounded border-light p-4 p-lg-5 w-100">
			<div class="text-center text-md-center mb-4 mt-md-0">
				<h1 class="mb-0 h3">Accomodation Selection</h1>
			</div>

			<div class="row">
				<div class="col-md-6">
          <div class="card border-0 shadow">
            <div class="card-body">
              <label for="searchPumpboat">Select Accomodation</label>
              <input type="text" class="form-control mb-2" id="search" wire:model.live.debounce.250ms="search" placeholder="Search Accomodation...">
              <ul class="list-group list-group-flush list my--3">

                @forelse ($accomodations as $accomodation)
                  <li class="list-group-item px-0">
                    <div class="row align-items-center">
                      <div class="col-auto ms--2">
                        <h4 class="h6 mb-0">
                          {{ $accomodation->name }}
                        </h4>
                      </div>
                      <div class="col text-end">
                        <button class="btn btn-sm btn-secondary d-inline-flex align-items-center" wire:click="selectAccomodation('{{ $accomodation->id }}')">
                          <svg class="icon icon-xxs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                          Select
                        </button>
                      </div>
                    </div>
                  </li>
                @empty
                  <li class="list-group-item px-0">
                    <div class="row align-items-center">
                      <div class="">
                        <h4 class="h6 mb-0 text-center">
                          No data.
                        </h4>
                      </div>
                    </div>
                  </li>
                @endforelse

              </ul>
            </div>
          </div>
				</div>
				<div class="col-md-6 mt-2 mt-md-0">
          @if ( isset($selectedAccomodation) )
            <div class="card card-body border-0 shadow mb-4 mb-xl-0">
              <h2 class="h5 mb-4">{{ $selectedAccomodation['name'] }}</h2>
              <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex align-items-center justify-content-between px-0 border-bottom">
                    <div>
                      <h3 class="h6 mb-1">Description</h3>
                      <p class="small pe-4">{{ $selectedAccomodation['description'] }}</p>
                    </div>
                  </li>
              </ul>
            </div>
          @endif
				</div>
			</div>

			<div class="row">
				<div class="col-md-5 col-lg-12">
				</div>
				<div class="col-md-7 col-lg-12">
				</div>
			</div>

			<div class="mt-5">
				<button type="button" class="btn btn-gray-800" wire:click="previousStep">Previous</button>
        @if ( isset($selectedAccomodation) )
				  <button type="button" class="btn btn-gray-800" wire:click="nextStep">Next</button>
        @endif
			</div>

		</div>
	</div>

</div>
