<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Models
use App\Models\Service;
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
      $services = Service::all();
      $providers = Provider::all();

      foreach ($providers as $provider) {
        foreach ($services as $service) {
          $exists = !empty(ServiceProvider::where('provider_id', $provider->id)->where('service_id', $service->id)->first());
          if (!$exists) {
            $serviceProvider = new ServiceProvider;

            $serviceProvider->provider_id = $provider->id;
            $serviceProvider->service_id = $service->id;

            $serviceProvider->save();
          }
        }
      }


    }
}
