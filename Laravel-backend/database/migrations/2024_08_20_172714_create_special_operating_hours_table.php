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
        Schema::create('special_operating_hours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('office_id');
            $table->date('special_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('special_operating_hours');
    }
};
