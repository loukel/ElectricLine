<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Models\Booking;
use App\Models\Address;
use App\Models\Service;
use App\Models\ServiceVariant;
use App\Models\ServiceProvider;
use App\Models\Provider;

class BookingController extends Controller
{
  public function address($slug) {
    $addresses = Address::where('user_id', Auth::id())->get();

    return view('services.book.address', compact('addresses'));
  }

  public function processAddress(Request $request, $slug) {
    if (isset($_POST['submit'])) {
      // Start the booking process
      $booking = new Booking;
      if (empty($_POST['addresses']) || $_POST['addresses'] === -1) {
        // Create new address
        $address = new Address;

        $address->user_id = Auth::id();
        $address->street = request('street');
        $address->postcode = request('postcode');
        $address->city = request('city');

        $address->save();

        // Set the address of the booking to the new address
        $booking->address_id = $address->id;
      } else {
        // Set the address of the booking to the existing address
        $booking->address_id = $_POST['addresses'];
      }

      // Hold the session booking
      $request->session()->put('booking', $booking);

      return redirect(route('services.book.variant', $slug));
    } else {
      return redirect(route('services.book.addresses', $slug));
    }
  }

  public function variant(Request $request, $slug) {
    return view('services.book.variant');
  }

  public function processVariant(Request $request, $slug) {
    if (isset($_POST['submit'])) {
      // Get session booking
      $booking = $request->session()->get('booking');

      // Get service id
      $serviceID = Service::where('slug', $slug)->first()->id;

      // Get service variant ID
      $serviceVariantID = ServiceVariant::where('service_id', $serviceID)->where('bedroom_number', request('bedrooms'))->where('type', request('type'))->first()->id;

      // Set service variant of the booking
      $booking->service_variant_id = $serviceVariantID;

      // Hold the session booking
      $request->session()->put('booking', $booking);

      return redirect(route('services.book.datetime', $slug));
    } else {
      return redirect(route('services.book.variant', $slug));
    }
  }

  public function datetime($slug) {
    return view('services.book.datetime');
  }

  public function processDatetime(Request $request, $slug) {
    if (isset($_POST['submit'])) {
      // Get session booking
      $booking = $request->session()->get('booking');

      // Get datetime
      $startDatetime = request('datetime');

      // Provider id set to the provider available TBC
      // Need to evaluate whether the provider is busy or not
      $providerID = Provider::first()->id;

      // Set provider id in booking
      $booking->provider_id = $providerID;

      // Get the service variant model
      $serviceVariant = ServiceVariant::find($booking->service_variant_id);

      // Set start and end datetime
      $booking->start = $startDatetime;

      $duration = $serviceVariant->duration;
      $booking->end = date('d-m-Y H:i', strtotime('+60 minutes', strtotime($startDatetime)));

      // Set total
      $booking->price = $serviceVariant->price;

      // Hold the session booking -> full
      $request->session()->put('booking', $booking);

      return redirect(route('services.book.pay', $slug));
    }
  }

  public function pay($slug) {
    return view('services.book.pay');
  }

  public function process() {
    return redirect(route('services.index'))->with('msg', 'Complete');
  }
}
