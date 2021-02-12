<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Models
use App\Models\ServiceVariant;
use App\Models\Address;
use App\Models\Customer;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // ! NOT COMPLETE, POSTPONED

      /**
       * Create address/use address
       * Select variant
       * Select Customer / create customer
       * Create booking
       * Time and date not at a time missing
       */
      // Get array of service variant ids
      $svIDs = ServiceVariant::select('id')->get();
      $svIDsArray = [];

      foreach ($svIDs as $value) {
        $svIDsArray[] = $value['id'];
      }

      // Get all customers
      $customers = Customer::all();

      foreach ($customers as $value) {
        $serviceVariantId = $faker->randomElement($array = $svIDsArray);

      }
    }
}
