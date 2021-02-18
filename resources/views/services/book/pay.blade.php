@extends('layouts.app')

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script defer src="{{ asset('js/payForm.js') }}"></script>
@endsection

@section('content')
<form
  action="{{ route('services.book.process', request()->route('slug')) }}"
  method="POST" id="pay-form" class="container py-4 d-flex flex-wrap justify-content-center">
  @csrf
  <div class="card p-5 w-75 booking-details">
    <div class="card-title h3">
      Booking details
    </div>
    <div class="booking-detail">
      <label for="service">Service:</label>
      <span class="detail">{{ $service }}</span>
    </div>
    <div class="booking-detail">
      <label for="type">Property Type:</label>
      <span class="detail">{{ $type }}</span>
    </div>
    <div class="booking-detail">
      <label for="bedrooms">Bedrooms:</label>
      <span class="detail">{{ $bedrooms }}</span>
    </div>
    <div class="booking-detail">
      <label for="address">Address:</label>
      <span class="detail">{{ $address }}</span>
    </div>
    <div class="booking-detail">
      <label for="date">Date:</label>
      <span class="detail">{{ $date }}</span>
    </div>
    <div class="booking-detail">
      <label for="time">Time:</label>
      <span class="detail">{{ $time }}</span>
    </div>
    <div class="booking-detail">
      <label for="provider">Provider Name:</label>
      <span class="detail">{{ $providerName }}</span>
    </div>
    <div class="booking-detail">
      <label for="total">Total:</label>
      <span class="detail">{{ $total }}</span>
    </div>
  </div>

  <div class="card p-5 w-75 mt-4 ">
    <div class="card-title h3">Payment Method</div>

    <div class="form-group">
      <label for="card-holder-name">Name on card</label>
      <input id="card-holder-name" class="form-control" type="text" value="{{ Auth::user()->name }}">
    </div>

    <div class="form-group">
      <label for="card-element">Credit or debit card</label>
      <div id="card-element" class="form-control" style='height: 2.4em; padding-top: .7em;'>
        <!-- A Stripe Element will be inserted here. -->
      </div>
      <div id="card-errors" class="alert alert-danger d-none"></div>
    </div>
    <button class="btn btn-success" id="card-button">
      Pay
    </button>
  </div>
</form>
@endsection
