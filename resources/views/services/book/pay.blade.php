@extends('layouts.app')

@section('content')
<form
  action="{{ route('services.book.process', request()->route('slug')) }}"
  method="POST" class="container py-4 d-flex flex-wrap justify-content-center">
  @csrf
  <div class="card p-5 w-75">
    <div class="card-title h3">Payment Method</div>
  </div>
  <div class="card p-5 mt-4 w-75 booking-details">
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
    <button class="btn btn-success">
      Pay and Confirm
    </button>
  </div>
</form>
@endsection
