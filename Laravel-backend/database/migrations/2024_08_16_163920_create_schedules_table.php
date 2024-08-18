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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->nullable();
            $table->date('date')->nullable();
            $table->tinyInteger('day_of_week')->unsigned();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->integer('max_reservations_per_hour')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
