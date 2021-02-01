<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Booking;
use App\Models\Address;

class BookingController extends Controller
{
  public function address($slug) {
    return view('services.book.address');
  }

  public function variant($slug) {
    return view('services.book.variant');
  }

  public function datetime($slug) {
    return view('services.book.datetime');
  }

  public function pay($slug) {
    return view('services.book.pay');
  }

  public function process() {
    return view('services.index');
  }
}
