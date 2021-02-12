@extends('layouts.app')

@section('content')
<form
  action="{{ route('services.book.process', request()->route('slug')) }}"
  method="POST" class="container py-4 d-flex justify-content-center flex-wrap">
  @csrf
  <div class="card p-5 w-75">
    <div class="card-body">
      <div class="card-title h3">Payment Method</div>
    </div>
  </div>
  <div class="card p-5 w-75 mt-4">
    <div class="card-body">
      <div class="card-title h3">
        Booking details
      </div>
      <hr/>
      <div class="h5">
        <label for="service">Service:</label>
        <span class="text-muted">{{ $service }}</span>
      </div>
            <div class="h5">
        <label for="type">Property Type:</label>
        <span class="text-muted">{{ $type }}</span>
      </div>
      <div class="h5">
        <label for="bedrooms">Bedrooms:</label>
        <span class="text-muted">{{ $bedrooms }}</span>
      </div>
      <hr/>
      <div class="h5">
        <label for="address">Address:</label>
        <span class="text-muted">{{ $address }}</span>
      </div>
      <div class="h5">
        <label for="date">Date:</label>
        <span class="text-muted">{{ $date }}</span>
      </div>
      <div class="h5">
        <label for="time">Time:</label>
        <span class="text-muted">{{ $time }}</span>
      </div>
      <div class="h5">
        <label for="provider">Provider Name:</label>
        <span class="text-muted">{{ $providerName }}</span>
      </div>
      <hr/>
      <div class="h5">
        <label for="total">Total:</label>
        <span class="text-muted">{{ $total }}</span>
      </div>
      <button class="btn btn-success">Pay and Confirm</button>
    </div>
  </div>
</form>
@endsection
