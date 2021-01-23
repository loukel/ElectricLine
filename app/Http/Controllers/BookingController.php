<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
  public function create($slug) {
    $bookingID = 1;

    return redirect(route('booking.pay', $slug, compact($bookingID)));
  }

  public function pay($slug) {
    return view('services.pay');
  }
}
