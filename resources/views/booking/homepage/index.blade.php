<x-booking-layout>
  <section class="mt-5 mt-lg-5 bg-soft d-flex align-items-center">
    <div class="container">
      <p class="text-center">
        <a href="{{ url('/') }}" class="d-flex align-items-center justify-content-center">
          <i class="icon icon-sm me-2 bi bi-arrow-left"></i>
          Back to homepage
        </a>
      </p>
      <div class="row justify-content-center form-bg-image">
        <livewire:booking-wizard />
      </div>
    </div>
  </section>
</x-booking-layout>
