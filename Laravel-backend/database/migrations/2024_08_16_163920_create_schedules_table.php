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
            $table->string('type'); // 'weekday'（平日）'holiday'（定休日）'custom'（特別な日）
            $table->date('date')->nullable(); // 特定の日付の場合はここに日付を保存
            $table->string('day_of_week')->nullable(); // 曜日を保存（日付が指定されていない場合）
            $table->time('start_time')->nullable(); // 営業開始時間
            $table->time('end_time')->nullable(); // 営業終了時間
            $table->integer('max_reservations_per_hour')->default(0); // 1時間あたりの最大予約枠
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
