<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceVariant extends Model
{
    use HasFactory;

    protected $table = 'service_variants';
        /**
     * Get the service of the service variant
     */
    public function service() {
      return $this->belongsTo(Service::class)->first();
    }

    public function getDisplay() {
      $serviceName = $this->service()->name;
      $bedrooms = $this->bedroom_number;
      $type = $this->type;
      return "{$serviceName}, ({$type}, {$bedrooms})";
    }
}
