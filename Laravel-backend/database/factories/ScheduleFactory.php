<?php

namespace Database\Factories;

use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['weekday', 'holiday', 'custom']),
            'date' => $this->faker->optional()->date(), // 50%の確率でNULL
            'day_of_week' => $this->faker->optional()->dayOfWeek, // 50%の確率でNULL
            'start_time' => '09:00', // 営業開始時間
            'end_time' => '18:00', // 営業終了時間
            'max_reservations_per_hour' => 2, // 1時間あたりの最大予約枠
        ];
    }
}
