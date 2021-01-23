@extends('layouts.app')

@section('content')
<div class="container py-4">
  {{-- row col-sm-3 --}}
  <div class="d-flex justify-content-center">
    <div class="w-75 p-4 card">
      <form action="{{ route('booking.create', request()->route('slug')) }}"
        method="POST" class="book">
        @csrf
        <div class="form-group">
          <label for="postcode">Postcode</label>
          <input class="form-control" type="text" id="postcode" name="postcode">
        </div>
        <div class="form-group">
          <label for="type">Property Type</label>
          <select class="form-control w-100" id="type" name="type">
            <option>House</option>
            <option>Flat / Appartment</option>
            <option>Bungalow</option>
          </select>
        </div>
        <div class="form-group">
          <label for="bedrooms">No. of Bedrooms</label>
          <select class="form-control" id="bedrooms" name="bedrooms">
            <option>Studio</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <span class="h5 text-muted">£10.50</span>
        </div>
        <div class="form-group">
          <label for="duration">Duration</label>
          <span class="h5 text-muted">1hr 30m</span>
        </div>
        <div class="form-group">
          <label for="time">At</label>
          <span class="h5 text-muted">12:00-13:30 on {{ date("j F, Y") }}</span>
        </div>
        <button class="btn btn-success w-100" type="submit" name="submit">Book service</button>
      </form>
    </div>
  </div>

  {{-- <div class="col-sm d-flex flex-column p-0">
    <div class="navigator card"></div>
    <div class="calender card h-100 w-25">

    </div>
  </div> --}}
</div>
<style>
  body {
    overflow: hidden;
  }

</style>
@endsection
