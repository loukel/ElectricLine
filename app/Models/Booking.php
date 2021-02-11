<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model {
  use HasFactory;

  // All attributes are mass asignable
  protected $guarded = [];

  /**
   * Get the address of the location
   */
  public function address() {
    return $this->belongsTo(Address::class)->first();
  }

    /**
   * Get the customer who made the booking
   */
  public function customer() {
    return $this->belongsTo(Customer::class)->first();
  }

    /**
   * Get the service variant
   */
  public function serviceVariant() {
    return $this->belongsTo(ServiceVariant::class)->first();
  }
    /**
   * Get the service
   */
  public function service() {
    return $this->serviceVariant()->service();
  }

    /**
   * Get the provider who is completing the booking
   */
  public function provider() {
    return $this->belongsTo(Provider::class)->first();
  }

  /**
   * Get start date
   */
  public function dateDisplay() {
    // Thursday 4th 2021
    // return date('l jS F, Y', strtotime($this->start));
    return date('l jS F, Y', strtotime($this->date));
  }

  /**
  *  Get start time
  */
  public function timeDisplay() {
    // 12:00am
    return date('g:ia', strtotime($this->start));
  }
}
