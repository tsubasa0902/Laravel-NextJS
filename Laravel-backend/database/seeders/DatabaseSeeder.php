<?php

namespace Database\Seeders;

// use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            ReservationsTableSeeder::class,
            CategoriesTableSeeder::class,
            MenusTableSeeder::class,
            OperatingHourSeeder::class,
            SpecialOperatingHourSeeder::class,
            SpecialClosureSeeder::class,
        ]);
    }
}
