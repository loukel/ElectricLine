<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceVariant extends Model
{
    use HasFactory;
        /**
     * Get the service of the service variant
     */
    public function services() {
      return $this->belongsTo(Services::class);
    }
}
