@extends('layouts.app')

@section('content')
<div class="container py-4">
  <div class="card">
    <table class="table table-bordered mb-0">
      <thead>
        <tr class="card-header">
          <th>Address</th>
          <th>Service</th>
          <th>Type</th>
          <th>Bedrooms</th>
          <th>Date</th>
          <th>Time</th>
          @if(Auth::user()->type == 'customer')
            <th>Provider</th>
            <th>Total</th>
          @else
            <th>Customer</th>
          @endif
        </tr>
      </thead>

      <tbody class="card-body">
        @forelse($bookings as $booking)
          <tr>
            {{-- onClick="location.href='{{ route('bookings.show', $booking->id) }}'"
            --}}
            <td>{{ $booking->address()->getDisplay() }}</td>
            <td>{{ $booking->service()->name }}</td>
            <td>{{ $booking->serviceVariant()->type }}</td>
            <td>{{ $booking->serviceVariant()->bedroom_number }}</td>
            <td>{{ $booking->dateDisplay() }}</td>
            <td>{{ date('g:ia', strtotime($booking->start)) }}</td>
            @if(Auth::user()->type == 'customer')
              <td>{{ $booking->provider()->name }}</td>
              <td>{{ "£$booking->total" }}</td>
            @else
              <td>{{ $booking->customer()->name }}</td>
            @endif
          </tr>
        @empty
          <tr>
            No Bookings
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  {{-- Pagination --}}
  <div class="d-flex justify-content-center mt-2">
    {{ $bookings->links('pagination::bootstrap-4') }}
  </div>
</div>
@endsection
