<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenusTableSeeder extends Seeder
{
    public function run()
    {
        // 10件のメニューを作成
        Menu::factory(10)->create();
    }
}