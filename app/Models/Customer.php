<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

// $customers = Customer::all();

class Customer extends User
{
    use HasFactory;

    protected $table = 'users';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('type', 'customer');
        });
    }

        /**
     * Get the bookings of the customer
     */
    public function bookings() {
      return $this->hasMany(Booking::class, 'customer_id');
    }

}
