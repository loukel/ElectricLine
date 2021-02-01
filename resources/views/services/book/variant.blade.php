@extends('layouts.app')

@section('scripts')

@endsection

@section('styles')

@endsection

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-center">
    <div class="w-75 p-2 card">
      <div class="card-body">
        <div class="card-title h2">
          Variation
        </div>
        <form
          action="{{ route('services.book.process-variant', request()->route('slug')) }}"
          method="POST" class="book">
          @csrf
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
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>Studio</option>
            </select>
          </div>
          <button class="btn btn-success w-100" type="submit" name="submit">Next</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
