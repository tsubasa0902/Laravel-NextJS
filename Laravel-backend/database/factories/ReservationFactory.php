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
            'user_id' => \App\Models\User::factory(), // ユーザーファクトリを使用して関連ユーザーを生成
            'menu_id' => \App\Models\Menu::factory(), // メニューファクトリを使用して関連メニューを生成
            'reservation_number' => date('Ymd') . '-' . Str::upper(Str::random(6)), // 予約番号を生成
            'status_flags' => 0, // デフォルトのステータスフラグ
            'reservation_datetime' => $this->faker->dateTimeBetween('now', '+1 week')->format('Y-m-d H:i:s'), // 現在から1週間以内のランダムな日時を生成
        ];
    }
}
