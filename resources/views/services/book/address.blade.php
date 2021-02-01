@extends('layouts.app')

@section('scripts')
<script src="{{ asset('js/addressForm.js') }}" defer></script>
@endsection

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-center">
    <div class="w-75 p-4 card">
      <div class="card-body">
        <div class="card-title h2">
          Address
        </div>
        <form
          action="{{ route('services.book.process-address', request()->route('slug')) }}"
          method="POST" class="book">
          @csrf
          @if($addresses->count())
            <div class="form-group">
              <label for="addresses">Existing Addresses</label>
              <select class="form-control" id="addresses" name="addresses">
                @foreach($addresses as $address)
                  <option value="{{ $address->id }}">
                    {{ $address->street }}, {{ $address->postcode }}, {{ $address->city }}
                  </option>
                @endforeach
                <option value="-1">Add New</option>
              </select>
            </div>
            <div class="form-group" id="newAddress" style="display: none;">
              <div class="form-group">
                <label for="street">Street</label>
                <input class="form-control" type="text" id="street" name="street">
              </div>
              <div class="form-group">
                <label for="postcode">Postcode</label>
                <input class="form-control" type="text" id="postcode" name="postcode">
              </div>
              <div class="form-group">
                <label for="city">City</label>
                <input class="form-control" type="text" id="city" name="city">
              </div>
            </div>
          @else
            <div class="form-group">
              <label for="street">Street</label>
              <input class="form-control" type="text" id="street" name="street" required>
            </div>
            <div class="form-group">
              <label for="postcode">Postcode</label>
              <input class="form-control" type="text" id="postcode" name="postcode" required>
            </div>
            <div class="form-group">
              <label for="city">City</label>
              <input class="form-control" type="text" id="city" name="city" required>
            </div>
          @endif
          <button class="btn btn-success w-100" type="submit" name="submit">Book service</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
