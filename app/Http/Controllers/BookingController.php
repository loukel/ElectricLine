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
use App\Models\Customer;
use App\Models\User;

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

      // Set the customer id
      $booking->customer_id = Auth::id();

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

      // $startDatetime = date('Y-m-d H:i:s', strtotime(request('datetime')));

      // Provider id set to the provider available TBC
      // Need to evaluate whether the provider is busy or not
      $providerID = Provider::first()->id;

      // Set provider id in booking
      $booking->provider_id = $providerID;

      // Get the service variant model
      $serviceVariant = ServiceVariant::find($booking->service_variant_id);

      // Get date & time
      $date = request('date-input');
      $startTime = request('time-input');

      $duration = $serviceVariant->duration;
      $endTime = date('H:i:s', strtotime("+$duration minutes", strtotime($startTime)));

      // Set the date and time
      $booking->date = $date;
      $booking->start = $startTime;
      $booking->end = $endTime;

      // Set total
      $booking->total = $serviceVariant->price;

      // Hold the session booking -> full
      $request->session()->put('booking', $booking);

      return redirect(route('services.book.pay', $slug));
    }
  }

  public function pay(Request $request, $slug) {
    // Get the session booking
    $booking = $request->session()->get('booking');

    // Get the booking details
    $service = $booking->serviceVariant()->getDisplay();
    $providerName = $booking->provider()->name;
    $customerName = $booking->customer()->name;
    $address = $booking->address()->getDisplay();
    $date = $booking->dateDisplay();
    $time = $booking->timeDisplay();
    $total = $booking->total;

    // Hold the session booking -> full
    $request->session()->put('booking', $booking);

    return view('services.book.pay', compact('service', 'providerName', 'customerName', 'address', 'date', 'time', 'total'));
  }

  public function process(Request $request, $slug) {
    // Get the session booking
    $booking = $request->session()->get('booking');

    // Store the booking
    $booking->save();

    return redirect(route('services.index'))->with('success', $booking->id);
  }

  public function index() {
    if (Auth::user()->provider()) {
      $bookings = Booking::where('provider_id', Auth::id())->paginate(10);
    } elseif  (Auth::user()->customer()) {
      $bookings = Booking::where('customer_id', Auth::id())->paginate(10);
    }

    return view('bookings.index', compact('bookings'));

  }

  public function show($id) {
    if (Auth::user()->provider()) {
      $booking = Booking::where('id', $id)->where('provider_id', Auth::id())->first();
    } elseif  (Auth::user()->customer()) {
      $booking = Booking::where('id', $id)->where('customer_id', Auth::id())->first();
    }

    if (!$booking) {
      return redirect('/');
    } else {
      return view('bookings.show', compact('booking'));
    }

  }
}
