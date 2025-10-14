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
        Schema::create('country_routes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('from_country_id')->constrained('countries');
            $table->foreignId('to_country_id')->constrained('countries');
            $table->integer('duration'); // in minutes
            $table->decimal('distance', 8, 2); // in kilometers
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_routes');
    }
};
