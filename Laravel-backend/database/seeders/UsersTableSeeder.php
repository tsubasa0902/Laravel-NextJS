<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 論理削除も含めてadminユーザーが存在するか確認
        $admin = User::withTrashed()->where('email', 'admin@test.com')->first();

        if (!$admin) {
            // adminユーザーが存在しない場合のみ作成
            User::factory()->create([
                'name' => 'admin',
                'email' => 'admin@test.com',
                'password' => bcrypt('password123'), // パスワードをハッシュ化
                'role' => 'admin',
            ]);
        } elseif ($admin->trashed()) {
            // adminユーザーが論理削除されている場合は復元
            $admin->restore();
        }

        // 他の一般ユーザーを追加
        User::factory(10)->create(); // 他の10人のユーザーを作成
    }
}
