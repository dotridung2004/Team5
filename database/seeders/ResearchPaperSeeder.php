<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\ResearchPaper;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ResearchPaperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi_VN');
        $users = DB::table('users')->pluck('TenTaiKhoan')->toArray();

        for ($i = 1; $i <= 15; $i++) {
            DB::table('research_papers')->insert([
                'mabaiviet' => 'BV' . $faker->unique()->numerify('####'),
                'tenbaiviet' => $faker->sentence,
                'mota' => $faker->paragraph,
                'noidung' => $faker->paragraphs(5, true),
                'path' => '/research/' . $faker->slug,
                'hinhanh' => $faker->imageUrl(),
                'ngaydang' => $faker->dateTimeThisYear(),
                'nguoidang' => $faker->randomElement($users),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
