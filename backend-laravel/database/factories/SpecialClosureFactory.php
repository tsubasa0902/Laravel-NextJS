<?php
namespace Database\Factories;

use App\Models\SpecialClosure;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpecialClosureFactory extends Factory
{
    public function definition()
    {
        return [
            'office_id' => \App\Models\Office::factory(),
            'closure_date' => $this->faker->date(),
        ];
    }
}