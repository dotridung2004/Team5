<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\News;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi_VN');
        $users = DB::table('users')->pluck('TenTaiKhoan')->toArray();

        for ($i = 1; $i <= 20; $i++) {
            DB::table('news')->insert([
                'matintuc' => 'TT' . $faker->unique()->numerify('####'),
                'tentintuc' => $faker->sentence,
                'mota' => $faker->paragraph,
                'path' => '/news/' . $faker->slug,
                'noidung' => $faker->paragraphs(3, true),
                'nguoidang' => $faker->randomElement($users),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
