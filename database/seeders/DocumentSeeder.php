<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\Document;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create('vi_VN');
        $users = DB::table('users')->pluck('TenTaiKhoan')->toArray();

        for ($i = 1; $i <= 20; $i++) {
            DB::table('documents')->insert([
                'matailieu' => 'TL' . $faker->unique()->numerify('####'),
                'tentailieu' => $faker->sentence,
                'hinhanh' => $faker->imageUrl(),
                'path' => '/documents/' . $faker->slug,
                'noidung' => $faker->paragraphs(3, true),
                'ngaydang' => $faker->dateTimeThisYear(),
                'trangthaiduyet' => $faker->boolean(70),
                'lydoan' => $faker->optional()->sentence,
                'nguoidang' => $faker->randomElement($users),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
