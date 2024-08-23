<?php
namespace Database\Factories;

use App\Models\SpecialOperatingHour;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpecialOperatingHourFactory extends Factory
{

    public function definition()
    {
        return [
            'office_id' => \App\Models\Office::factory(),
            'special_date' => $this->faker->date(),
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
        ];
    }
}