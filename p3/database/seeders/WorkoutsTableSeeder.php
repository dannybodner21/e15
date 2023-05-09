<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Workout;
use App\Models\Exercise;

class WorkoutsTableSeeder extends Seeder {

    private $faker;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->faker = Factory::create();
        $this->addWorkout();
    }

    private function addWorkout() {
        // Create a workout
        $workout = new Workout();
        $workout->created_at = $this->faker->dateTimeThisMonth();
        $workout->updated_at = $this->faker->dateTimeThisMonth();

        // Create name
        $workout->name = 'My seeded workout';

        // Body part description
        $workout->body_part_description = 'Chest';

        // Add a user
        $workout->user_id = 1;

        // Add cardio
        $workout->cardio_exercise_id = 2;

        // Save workout
        $workout->save();

        // Get main exercises
        $exerciseOne = Exercise::where('name','=','Barbell bench press')->first();
        $exerciseTwo = Exercise::where('name','=','Incline barbell bench press')->first();
        $exerciseThree = Exercise::where('name','=','Dumbbell flies')->first();

        // Attach main exercises
        $workout->exercises()->attach($exerciseOne);
        $workout->exercises()->attach($exerciseTwo);
        $workout->exercises()->attach($exerciseThree);
        
    }
}