<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $this->call([
            UserSeeder::class,
            AdminSeeder::class,
            StudentSeeder::class,
            TeacherSeeder::class,
            DocumentSeeder::class,
            ResearchPaperSeeder::class,
            NewsSeeder::class,
            FeedbackSeeder::class,
        ]);
    }
}
