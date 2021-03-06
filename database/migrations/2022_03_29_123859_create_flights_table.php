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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('airline_id')->references('id')->on('airlines')->cascadeOnDelete();;
            $table->foreignId('origin_id')->references('id')->on('cities')->cascadeOnDelete();
            $table->foreignId('destination_id')->references('id')->on('cities')->cascadeOnDelete();
            $table->time('takeoffTime');
            $table->time('landingTime');
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
        Schema::dropIfExists('flights');
    }
};
