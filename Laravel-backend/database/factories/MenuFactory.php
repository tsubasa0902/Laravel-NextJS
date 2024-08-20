<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    public function definition()
    {
        return [
            'office_id' => \App\Models\Office::factory(),
            'category_id' => \App\Models\Category::factory(),
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'duration' => $this->faker->numberBetween(30, 120),
            'price' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}