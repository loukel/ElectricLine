<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Booking;

class BookingController extends Controller
{
  public function pay($slug) {
    return view('services.pay');
  }

  public function process($slug) {
    $booking = new Booking;

    $booking;

    return view('services.pay');
  }
}
