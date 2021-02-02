@extends('layouts.app')

@section('scripts')
<script defer src="{{ asset('js/services.js') }}"></script>
@endsection

@section('content')
<div class="container py-4">
  <div
    class="alert alert-success {{ session('success') ? '' : 'd-none' }}"
    role="alert" id="booking-confirmation">
    Your booking is complete. You can view it here <a href="{{ session('success') }}"
      class="alert-link">Booking ID - {{ session('success') }}</a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick=>
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="card-deck">
    <div class="card">
      <img class="card-img-top" src="img/lightbulb.jpg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">EIRC Report</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
          content. This content is a little bit longer.</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi consequuntur temporibus porro
          accusamus at similique, asperiores pariatur, nemo rerum a iure nam esse illo sapiente vel nisi
          repellat ipsam assumenda nobis amet ea, magni fuga unde est. Porro ipsam temporibus exercitationem
          repellat dolorum aut nesciunt illo et, quasi cupiditate eum!</p>
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
        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
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
