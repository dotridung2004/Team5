<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\Feedback;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi_VN');
        $users = DB::table('users')->pluck('TenTaiKhoan')->toArray();
        $news = DB::table('news')->pluck('matintuc')->toArray();

        for ($i = 1; $i <= 30; $i++) {
            $ngaythacmac = $faker->dateTimeThisYear();
            DB::table('feedback')->insert([
                'mathacmac' => 'TM' . $faker->unique()->numerify('####'),
                'nguoigui' => $faker->randomElement($users),
                'noidung' => $faker->paragraph,
                'phanhoi' => $faker->boolean(70) ? $faker->paragraph : null,
                'ngaythacmac' => $ngaythacmac,
                'ngayphanhoi' => $faker->boolean(70) ? $faker->dateTimeBetween($ngaythacmac, 'now') : null,
                'nguoiphanhoi' => $faker->boolean(70) ? $faker->randomElement($users) : null,
                'trangthai' => $faker->randomElement(['pending', 'processing', 'resolved']),
                'mabaiviet' => $faker->boolean(50) ? $faker->randomElement($news) : null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
