<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create('vi_VN');
        $users = DB::table('users')->where('vaitro', 'admin')->pluck('TenTaiKhoan')->toArray();

        foreach ($users as $user) {
            DB::table('admins')->insert([
                'maquantri' => 'AD' . $faker->unique()->numerify('####'),
                'tenquantri' => $faker->name,
                'ngaysinh' => $faker->date('Y-m-d', '-20 years'),
                'gioitinh' => $faker->randomElement(['Nam', 'Nữ']),
                'quequan' => $faker->city,
                'tentaikhoan' => $user,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
