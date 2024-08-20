<?php

namespace Database\Factories;

use App\Models\OperatingHour;
use Illuminate\Database\Eloquent\Factories\Factory;

class OperatingHourFactory extends Factory
{
    public function definition()
    {
        return [
            'office_id' => \App\Models\Office::factory(),
            'day_of_week' => $this->faker->numberBetween(0, 6),
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
        ];
    }
}