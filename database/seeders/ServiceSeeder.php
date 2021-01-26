<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Libraries
use Illuminate\Support\Str;

// Models
use App\Models\Service;
use App\Models\ServiceVariant;

class ServiceSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
      $serviceNames = array('EIRC Report', 'Consumer Unit Replacement');
      $types = array('House', 'Flat / Appartment', 'Bungalow');
      $bedroomNumbers = array('Studio', '1', '2', '3', '4', '5');

      foreach ($serviceNames as $serviceName) {
        $service = new Service;

        $service->name = $serviceName;
        $service->slug = Str::slug($serviceName);

        $service->save();

        foreach ($types as $type) {
          foreach ($bedroomNumbers as $bedroomNumber) {
            $serviceVariant = new ServiceVariant;

            $serviceVariant->service_id = $service->id;
            $serviceVariant->bedroom_number = $bedroomNumber;
            $serviceVariant->type = $type;
            $serviceVariant->duration = 60;
            $serviceVariant->price = 1;

            $serviceVariant->save();
          }
        }
      }
    }
}
