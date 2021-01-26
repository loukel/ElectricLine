<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Models
use App\Models\ServiceVariant;
use App\Models\Provider;
use App\Models\ServiceProvider;

class ServiceProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $serviceVariants = ServiceVariant::all();
      $providers = Provider::all();

      foreach ($providers as $provider) {
        foreach ($serviceVariants as $serviceVariant) {
          $exists = !empty(ServiceProvider::where('provider_id', $provider->id)->where('service_variant_id', $serviceVariant->id)->first());
          if (!$exists) {
            $serviceProvider = new ServiceProvider;

            $serviceProvider->provider_id = $provider->id;
            $serviceProvider->service_variant_id = $serviceVariant->id;

            $serviceProvider->save();
          }
        }
      }


    }
}
