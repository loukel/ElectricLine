<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

// $providers = Provider::all();

class Provider extends User
{
    use HasFactory;

     /**
     * Get the service variants of the provider
     */
    protected $table = 'users';

    public static function boot()
    {
      parent::boot();

      static::addGlobalScope(function ($query) {
        $query->where('type', 'provider');
      });
    }


    public function serviceVariants() {
      return $this->hasManyThrough(ServiceVariant::class, ServiceProvider::class, 'provider_id',);
    }


        /**
     * Get services of the provider
     */
    public function services() {
      return $this->hasManyThrough(Services::class, ServiceVariant::class, ServiceProvider::class, 'provider_id', );
    }
}
