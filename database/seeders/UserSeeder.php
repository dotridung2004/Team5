<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create('vi_VN');

        // Tạo 50 users mẫu
        for ($i = 1; $i <= 50; $i++) {
            DB::table('users')->insert([
                'tentaikhoan' => $faker->userName,
                'password' => bcrypt('password123'), // Mã hóa mật khẩu
                'vaitro' => $faker->randomElement(['admin', 'teacher', 'student']),
                'email' => $faker->unique()->safeEmail,
                'gioithieu' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
