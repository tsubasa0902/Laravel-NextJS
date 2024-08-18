<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'menu_id' => \App\Models\Menu::factory(),
            'reservation_number' => date('Ymd') . '-' . Str::upper(Str::random(6)), // 予約番号を生成
            'status_flags' => 0,
            'reservation_date' => $this->faker->date(),
            'reservation_time' => $this->faker->time(),
        ];
    }
}
