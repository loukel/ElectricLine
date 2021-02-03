<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
      if (!Auth::user() or Auth::user()->customer())
        return redirect(route('services.index'));
      elseif (Auth::user()->provider())
        return redirect(route('bookings.index'));

    }
}
