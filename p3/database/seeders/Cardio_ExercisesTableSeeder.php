<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Cardio_Exercise;

class Cardio_ExercisesTableSeeder extends Seeder {

    private $faker;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->faker = Factory::create();
        $this->addCardioExercises();
    }

    // 6 exercises so far
    private function addCardioExercises() {
        // 30 min slow run
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Run';
        $exercise->exercise = '30 min slow run';
        $exercise->save();
        // 4 mile run
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Run';
        $exercise->exercise = '4 mile run';
        $exercise->save();
        // 4 x 1 mile repeats
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Run';
        $exercise->exercise = '4 x 1 mile repeats';
        $exercise->save();
        // 1 mile swim
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Swim';
        $exercise->exercise = '1 mile swim';
        $exercise->save();
        // 15 mile bike ride
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Bike';
        $exercise->exercise = '15 mile bike ride';
        $exercise->save();
        // 20 min stairclimber
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Stairclimber';
        $exercise->exercise = '20 min stairclimber';
        $exercise->save();
    }
}