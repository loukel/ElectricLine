@extends('layouts.app')

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js">
</script>
@endsection

@section('styles')
<link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css">
@endsection

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-center">
    <div class="w-75 p-2 card">
      <div class="card-body">
        <div class="card-title h2">
          Date and Time
        </div>
        <form
          action="{{ route('services.book.process-datetime', request()->route('slug')) }}"
          method="POST" class="book">
          @csrf
          <div id="datetime-picker"></div>
          <button class="btn btn-success w-100" type="submit" name="submit">Next</button>
        </form>
      </div>
    </div>
  </div>
</div>



@endsection
