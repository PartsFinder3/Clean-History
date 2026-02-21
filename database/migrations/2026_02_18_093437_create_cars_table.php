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
        if (!Schema::hasTable('cars')) {
            Schema::create('cars', function (Blueprint $table) {
                $table->id();
                $table->string('car_name');
                $table->string('vin')->unique();
                $table->text('description')->nullable();
                $table->text('car_image_url')->nullable();
                $table->string('mileage')->nullable();
                $table->string('location')->nullable();
                $table->string('damage')->nullable();
                $table->string('slug')->unique();
                $table->timestamps();
                
                $table->index('created_at');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
