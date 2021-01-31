@extends('layouts.app')

@section('scripts')

@endsection

@section('styles')

@endsection

@section('content')
<div class="container py-4">
  {{-- row col-sm-3 --}}
  <div class="d-flex justify-content-center">
    <div class="w-75 p-4 card">
      <form action="{{ route('booking.pay', request()->route('slug')) }}"
        method="GET" class="book">
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

@endsection
