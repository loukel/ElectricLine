@extends('layouts.app')

@section('content')
<div class="row min-vh-100">
  <div class="col-sm-3 pl-4 py-4 card">
    <form action="" class="bg-primary h-100 w-75 container book">
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
      <div class="h3" id="price">
        £1
      </div>
      <button class="btn btn-success" type="submit" name="submit">Book service</button>
    </form>
  </div>
  <div class="col-sm d-flex flex-column p-0 card">
    <div class="navigator card">bg-primaryhe</div>
    <div class="calender card h-100">hebg-danger </div>
  </div>
</div>
<style>
  body {
    overflow: hidden;
  }

</style>
@endsection
