<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SpecialClosure;

class SpecialClosureSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */    public function run(): void
    {
        SpecialClosure::factory(5)->create();
    }
}
