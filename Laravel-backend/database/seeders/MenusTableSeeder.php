<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenusTableSeeder extends Seeder
{
    public function run()
    {
        // 20件のメニューを作成
        Menu::factory(20)->create();
    }
}