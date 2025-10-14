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
        Schema::create('vehicle_specs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained();
            $table->string('transmission')->nullable();
            $table->string('mileage')->nullable();
            $table->string('steering')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('engine')->nullable();
            $table->string('power')->nullable();
            $table->string('torque')->nullable();
            $table->string('acceleration')->nullable();
            $table->string('top_speed')->nullable();
            $table->string('fuel_capacity')->nullable();
            $table->string('weight')->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('wheelbase')->nullable();
            $table->string('ground_clearance')->nullable();
            $table->string('turning_radius')->nullable();
            $table->string('boot_space')->nullable();
            $table->string('air_conditioning')->nullable();
            $table->string('infotainment')->nullable();
            $table->string('safety_features')->nullable();
            $table->string('comfort_features')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_specs');
    }
};
