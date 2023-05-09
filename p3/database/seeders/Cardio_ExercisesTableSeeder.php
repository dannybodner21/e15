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

    // 24 cardio exercises
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
        // 2 mile run
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Run';
        $exercise->exercise = '2 mile run';
        $exercise->save();
        // 45 min recovery run
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Run';
        $exercise->exercise = '45 min recovery run';
        $exercise->save();
        // 3 mile run - fast paced
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Run';
        $exercise->exercise = '3 mile run - fast paced';
        $exercise->save();
        // 4 x 1 mile repeats
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Run';
        $exercise->exercise = '4 x 1 mile repeats';
        $exercise->save();
        // 6 x 400 meter repeats
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Run';
        $exercise->exercise = '6 x 400 meter repeats';
        $exercise->save();
        // 4 x 800 meter repeats
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Run';
        $exercise->exercise = '4 x 800 meter repeats';
        $exercise->save();
        // 8 x 400 meter repeats
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Run';
        $exercise->exercise = '8 x 400 meter repeats';
        $exercise->save();

        // 1 mile swim
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Swim';
        $exercise->exercise = '1 mile swim';
        $exercise->save();
        // 500 meter swim for time
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Swim';
        $exercise->exercise = '500 meter swim for time';
        $exercise->save();
        // 1000 meter swim with fins
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Swim';
        $exercise->exercise = '1000 meter swim with fins';
        $exercise->save();
        // 10 x 50 meter sprints any stroke
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Swim';
        $exercise->exercise = '10 x 50 meter sprints any stroke';
        $exercise->save();
        
        // 15 mile bike ride
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Bike';
        $exercise->exercise = '15 mile bike ride';
        $exercise->save();
        // 20 mile bike ride
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Bike';
        $exercise->exercise = '20 mile bike ride';
        $exercise->save();
        // 10 mile bike ride
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Bike';
        $exercise->exercise = '10 mile bike ride';
        $exercise->save();
        // 30 min bike ride
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Bike';
        $exercise->exercise = '30 min bike ride';
        $exercise->save();

        // 20 min stairmaster
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Stairmaster';
        $exercise->exercise = '20 min stairmaster';
        $exercise->save();
        // 30 min stairmaster
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Stairmaster';
        $exercise->exercise = '30 min stairmaster';
        $exercise->save();
        // 10 min stairmaster highest speed
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Stairmaster';
        $exercise->exercise = '10 min stairmaster highest speed';
        $exercise->save();

        // 20 min slow row
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Row';
        $exercise->exercise = '20 min slow row';
        $exercise->save();
        // 20 x 60 second row sprints
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Row';
        $exercise->exercise = '20 x 60 second row sprints';
        $exercise->save();
        // 1000 meter row
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Row';
        $exercise->exercise = '1000 meter row';
        $exercise->save();
        // 2000 meter row
        $exercise = new Cardio_Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->type = 'Row';
        $exercise->exercise = '2000 meter row';
        $exercise->save();
    }
}