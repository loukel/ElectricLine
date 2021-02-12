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

      if (empty(request('addresses')) || request('addresses') == -1) {
        // Create new address
        $validated = $request->validate([
          'street' => 'required',
          'postcode' => 'required|max:8',
          'city' => 'required|string',
        ]);

        $address = new Address;

        $address->user_id = Auth::id();
        $address->street = $validated['street'];
        $address->postcode = $validated['postcode'];
        $address->city = $validated['city'];

        $address->save();

        // Set the address of the booking to the new address
        $booking->address_id = $address->id;
      } else {
        // Set the address of the booking to the existing address
        $booking->address_id = request('addresses');
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
      $validated = $request->validate([
        'bedrooms' => 'required|exists:App\Models\ServiceVariant,bedroom_number',
        'type' => 'required|exists:App\Models\ServiceVariant,type',
      ]);

      // Get session booking
      $booking = $request->session()->get('booking');

      // Get service id
      $serviceID = Service::where('slug', $slug)->first()->id;

      // Get service variant ID
      $serviceVariantID = ServiceVariant::where('service_id', $serviceID)->where('bedroom_number', $validated['bedrooms'])->where('type', $validated['type'])->first()->id;

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

  public function minMaxTimes($slug) {
    return Service::select('sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday')->where('slug', $slug)->first();
  }

  public function unavailableTimes($slug) {
    $date = request('date');

    // Takes into account bookings of any service by any provider -> bookings only use one provider for now
    return Booking::select('start', 'end')->where('date', $date)->get();
  }

  public function processDatetime(Request $request, $slug) {
    if (isset($_POST['submit'])) {
      $today = date('Y-m-d', strtotime("-1 days"));
      $validated = $request->validate([
        'date-input' => "required|date|after:$today",
        'time-input' => 'required',
      ]);
      // TODO: Validate time better

      // Get session booking
      $booking = $request->session()->get('booking');

      // Provider id set to the provider available TBC
      // Need to evaluate whether the provider is busy or not
      $providerID = Provider::first()->id;

      // Set provider id in booking
      $booking->provider_id = $providerID;

      // Get the service variant model
      $serviceVariant = ServiceVariant::find($booking->service_variant_id);

      // Get date & time
      $date = $validated['date-input'];
      $startTime =  $validated['time-input'];

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
    $service = $booking->service()->name;
    $bedrooms = $booking->serviceVariant()->bedroom_number;
    $type = $booking->serviceVariant()->type;
    $providerName = $booking->provider()->name;
    $address = $booking->address()->getDisplay();
    $date = $booking->dateDisplay();
    $time = $booking->timeDisplay();
    $total = "£$booking->total";

    // Hold the session booking -> full
    $request->session()->put('booking', $booking);

    return view('services.book.pay', compact('service', 'bedrooms', 'type', 'providerName', 'address', 'date', 'time', 'total'));
  }

  public function process(Request $request, $slug) {
    // Get the session booking
    $booking = $request->session()->get('booking');

    // Store the booking with a transaction
    DB::transaction(function () {
      $booking->save();
    });

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
