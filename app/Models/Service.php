<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
     /**
     * Get the service variants
     */
    public function variants() {
      return $this->hasMany(ServiceVariant::class);
    }
}
