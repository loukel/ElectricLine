@extends('layouts.app')

@section('content')
<div class="container py-4">
  <div class="card">
    <div class="card-body">
      <div class="card-title h2">
        {{ $booking->service()->name }}
        <small class="text-muted">{{ $booking->dateDisplay() }}, {{ $booking->timeDisplay() }}</small>
      </div>
      <div class="h6 mb-3">
        {{ $booking->dateDisplay() }}
      </div>
      <div class="h5">
        <label for="service">Property Type:</label>
        <span class="text-muted">{{ $booking->serviceVariant()->type }}</span>
      </div>
      <div class="h5">
        <label for="service">Bedrooms:</label>
        <span class="text-muted">{{ $booking->serviceVariant()->bedroom_number }}</span>
      </div>
    </div>

  </div>
</div>
@endsection
