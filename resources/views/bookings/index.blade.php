@extends('layouts.app')

@section('content')
<div class="container py-4">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Service</th>
        <th>Type</th>
        <th>Bedrooms</th>
        <th>Date</th>
        <th>Time</th>
        <th>Provider</th>
        <th>Total</th>
        <th>Status</th>
      </tr>
    </thead>

    <tbody>
      @forelse($bookings as $booking)
        <tr>
          <td>{{ $booking->service()->name }}</td>
          <td>{{ $booking->serviceVariant()->type }}</td>
          <td>{{ $booking->serviceVariant()->bedroom_number }}</td>
          <td>{{ $booking->dateDisplay() }}</td>
          <td>{{ $booking->timeDisplay() }}</td>
          <td>{{ $booking->provider()->name }}</td>
          <td>{{ $booking->total }}</td>
          <td>{{ $booking->status }}</td>
        </tr>
      @empty
        <tr>
          No Bookings
        </tr>
      @endforelse
    </tbody>
  </table>

  {{-- Pagination --}}
  <div class="d-flex justify-content-center">
    {{ $bookings->links('pagination::bootstrap-4') }}
  </div>
</div>
@endsection
