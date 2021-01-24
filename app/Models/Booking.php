<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model {
  use HasFactory;
  /**
   * Get the address of the location
   */
  public function address() {
    return $this->belongsTo(Address::class);
  }

    /**
   * Get the customer who made the booking
   */
  public function customer() {
    return $this->belongsTo(Customer::class);
  }

    /**
   * Get the service variant
   */
  public function service_variant() {
    return $this->belongsTo(Provider::class);
  }

    /**
   * Get the provider who is completing the booking
   */
  public function provider() {
    return $this->belongsTo(ServiceVariant::class);
  }
}
