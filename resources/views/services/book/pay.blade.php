@extends('layouts.app')

@section('content')
<div class="container py-4 w-50 d-flex justify-content-center flex-wrap">
  <div class="card p-5 w-75">
    <div class="card-body">
      <div class="card-title h3">Payment Method</div>
    </div>
  </div>
  <div class="card p-5 w-75 mt-4">
    <div class="card-body">
      <div class="card-title h3">Booking details</div>
      <div>
        <label for="service">Service</label>
        <span class="h5 text-muted"></span>
      </div>
      <div>
        <label for="service">Name</label>
        <span class="h5 text-muted"></span>
      </div>
      <div>
        <label for="service">Address</label>
        <span class="h5 text-muted"></span>
      </div>
      <div>
        <label for="service">Provider</label>
        <span class="h5 text-muted"></span>
      </div>
      <div>
        <label for="service">Date</label>
        <span class="h5 text-muted"></span>
      </div>
      <div>
        <label for="service">Time</label>
        <span class="h5 text-muted"></span>
      </div>
      <div>
        <label for="service">Booking Total</label>
        <span class="h5 text-muted"></span>
      </div>
      <button class="btn btn-success">Pay and Confirm</button>
    </div>
  </div>
</div>
@endsection
