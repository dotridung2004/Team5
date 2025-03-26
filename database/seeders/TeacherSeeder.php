<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi_VN');
        $users = DB::table('users')->where('vaitro', 'teacher')->pluck('TenTaiKhoan')->toArray();

        foreach ($users as $user) {
            DB::table('teachers')->insert([
                'magiaovien' => 'GV' . $faker->unique()->numerify('####'),
                'tengiaovien' => $faker->name,
                'khoa' => $faker->randomElement(['CNTT', 'Kinh tế', 'Ngoại ngữ', 'Kỹ thuật']),
                'ngaysinh' => $faker->date('Y-m-d', '-25 years'),
                'gioitinh' => $faker->randomElement(['Nam', 'Nữ']),
                'quequan' => $faker->date('Y-m-d'),
                'tentaikhoan' => $user,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
