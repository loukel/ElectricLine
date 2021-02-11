<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('services', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('slug');
        $table->string('sunday', 11)->default('09:00-20:00');
        $table->string('monday', 11)->default('09:00-20:00');
        $table->string('tuesday', 11)->default('09:00-20:00');
        $table->string('wednesday', 11)->default('09:00-20:00');
        $table->string('thursday', 11)->default('09:00-20:00');
        $table->string('friday', 11)->default('09:00-20:00');
        $table->string('saturday', 11)->default('09:00-20:00');
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('services');
    }
}
