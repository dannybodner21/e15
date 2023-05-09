<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ExercisesTableSeeder::class);
        $this->call(AbsTableSeeder::class);
        $this->call(Cardio_ExercisesTableSeeder::class);
        $this->call(WorkoutsTableSeeder::class);
    }
}