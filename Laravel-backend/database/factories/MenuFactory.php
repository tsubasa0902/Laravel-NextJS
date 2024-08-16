<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    protected $model = Menu::class;

    public function definition()
    {
        return [
            'category_id' => \App\Models\Category::factory(), // 関連するカテゴリを生成
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'duration' => $this->faker->numberBetween(30, 120), // 30〜120分のランダムな時間
            'price' => $this->faker->randomFloat(2, 10, 100), // 10.00〜100.00のランダムな価格
        ];
    }
}