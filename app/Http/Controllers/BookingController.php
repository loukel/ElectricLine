<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Booking;

class BookingController extends Controller
{
  public function create($slug) {
    // $booking = new Booking();
    request('postcode');

    $bookingID = 1;

    return redirect(route('booking.pay', $slug, compact($bookingID)));
  }

  public function pay($slug) {
    return view('services.pay');
  }
}
