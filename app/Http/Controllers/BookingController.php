<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Models\Booking;
use App\Models\Address;

class BookingController extends Controller
{
  public function address($slug) {
    $addresses = Address::where('user_id', Auth::id())->get();

    return view('services.book.address', compact('addresses'));
  }

  public function processAddress($slug) {
    // Needs validation and strings need to be sanitized
    if (isset($_POST['submit'])) {
      $booking = new Booking;
      if (empty($_POST['addresses']) || $_POST['addresses'] === -1) {
        $address = new Address;

        $address->user_id = Auth::id();
        $address->street = request('street');
        $address->postcode = request('postcode');
        $address->city = request('city');

        $address->save();

        $booking->address_id = $address->id;
      } else {
        $booking->address_id = $_POST['addresses'];
      }
      return redirect(route('services.book.variant', $slug, compact('booking')));
    } else {
      return redirect(route('services.book.addresses', $slug));
    }
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
