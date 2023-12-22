<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('bus_number');
            $table->date('trip_date');
            $table->unsignedBigInteger('departure_location');
            $table->foreign('departure_location')->references('id')->on('locations')->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedBigInteger('arrival_location');
            $table->foreign('arrival_location')->references('id')->on('locations')->onDelete('restrict')->onUpdate('cascade');
            $table->string('trip_type')->nullable();
            $table->integer('trip_fare');
            $table->dateTime('departure_date_time');
            $table->dateTime('arrival_date_time');
            $table->tinyInteger('trip_status');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
