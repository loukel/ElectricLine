@extends('layouts.app')

@section('scripts')
<script defer src="{{ asset('js/services.js') }}"></script>
@endsection

@section('content')
<div class="container py-4">
  <div
    class="alert alert-success {{ session('success') ? '' : 'd-none' }}"
    role="alert" id="booking-confirmation">
    Your booking is complete. You can view all your bookings here - <a
      href="{{ route('bookings.index') }}" class="alert-link">My Bookings</a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick=>
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="card-deck">
    <div class="card">
      <img class="card-img-top" src="img/lightbulb.jpg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">EIRC Report</h5>
        <p class="card-text">
          An EICR is an Electrical Installation Condition Report. It is a formal document that is produced following an
          assessment of the electrical installation within a property. It must be carried out by an experienced
          qualified electrician or approved contractor...</p>
      </div>
      <div class="card-footer text-center p-0">
        <a href="{{ route('services.book.address', 'eirc-report') }}"
          class="btn btn-primary w-100">
          Select
        </a>
      </div>
    </div>
    <div class="card">
      <img class="card-img-top" src="img/consumerunit.jpg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Consumer Unit Replacement</h5>
        <p class="card-text">Consumer units (CU) are replaced for various reasons. This includes replacement where the
          existing unit does
          not meet the requirements of BS 7671, for example, where there is no RCD protection. Or there may be no spare
          capacity in the existing consumer unit to connect additional circuits...</p>
      </div>
      <div class="card-footer text-center p-0">
        <a href="{{ route('services.book.address', 'consumer-unit-replacement') }}"
          class="btn btn-primary w-100">
          Select
        </a>
      </div>
    </div>
  </div>
</div>
@endsection
