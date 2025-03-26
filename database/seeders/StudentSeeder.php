<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi_VN');
        $users = DB::table('users')->where('vaitro', 'student')->pluck('TenTaiKhoan')->toArray();

        foreach ($users as $user) {
            DB::table('students')->insert([
                'masinhvien' => 'SV' . $faker->unique()->numerify('####'),
                'tensinhvien' => $faker->name,
                'khoa' => $faker->randomElement(['CNTT', 'Kinh tế', 'Ngoại ngữ', 'Kỹ thuật']),
                'lop' => 'D' . $faker->numerify('##') . $faker->randomElement(['A', 'B', 'C']),
                'ngaysinh' => $faker->date('Y-m-d', '-18 years'),
                'gioitinh' => $faker->randomElement(['Nam', 'Nữ']),
                'quequan' => $faker->city,
                'tentaikhoan' => $user,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
