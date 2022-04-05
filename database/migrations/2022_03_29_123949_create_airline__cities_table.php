<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airline__cities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->references('id')->on('cities');
            $table->foreignId('airline_id')->references('id')->on('airlines');
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
        Schema::dropIfExists('airline__cities');
    }
};
