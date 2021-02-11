<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Models
use App\Models\Service;

class ServiceTimesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $EIRC = Service::find(1);
      $consumerUnitReplacement = Service::find(2);

      $EIRC->sunday = '11:00-18:00';
      // $EIRC->monday = '';
      // $EIRC->tuesday = '';
      // $EIRC->wednesday = '';
      // $EIRC->thursday = '';
      // $EIRC->friday = '';
      $EIRC->saturday = '11:00-18:00';

      $EIRC->save();

      $consumerUnitReplacement->sunday = '11:00-18:00';
      $consumerUnitReplacement->monday = '08:00-21:00';
      $consumerUnitReplacement->tuesday = '08:00-21:00';
      $consumerUnitReplacement->wednesday = '08:00-21:00';
      $consumerUnitReplacement->thursday = '08:00-21:00';
      $consumerUnitReplacement->friday = '08:00-21:00';
      $consumerUnitReplacement->saturday = '11:00-18:00';

      $consumerUnitReplacement->save();
    }
}
