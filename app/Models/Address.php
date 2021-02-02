<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getDisplay() {
      $street = $this->street;
      $postcode = $this->postcode;
      $city = $this->city;

      return "$street, $postcode, $city";
    }
}
