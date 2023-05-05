<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Exercise;

class ExercisesTableSeeder extends Seeder {

    private $faker;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
    $this->faker = Factory::create();
    $this->addChestExercises();
    $this->addBackExercises();
    $this->addShouldersExercises();
    $this->addLegsExercises();
    $this->addBicepsExercises();
    $this->addTricepsExercises();
}

    // 8 exercises so far
    private function addChestExercises() {
        // barbell bench press
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Barbell bench press';
        $exercise->body_part = 'Chest';
        $exercise->set_count = 5;
        $exercise->rep_count = 8;
        $exercise->save();
        // dumbbell bench press
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Dumbbell bench press';
        $exercise->body_part = 'Chest';
        $exercise->set_count = 5;
        $exercise->rep_count = 8;
        $exercise->save();
        // barbell incline bench press
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Barbell incline bench press';
        $exercise->body_part = 'Chest';
        $exercise->set_count = 5;
        $exercise->rep_count = 8;
        $exercise->save();
        // dumbbell incline bench press
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Dumbbell incline bench press';
        $exercise->body_part = 'Chest';
        $exercise->set_count = 5;
        $exercise->rep_count = 8;
        $exercise->save();
        // dumbbell flies
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Dumbbell flies press';
        $exercise->body_part = 'Chest';
        $exercise->set_count = 4;
        $exercise->rep_count = 10;
        $exercise->save();
        // machine flies
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Machine flies';
        $exercise->body_part = 'Chest';
        $exercise->set_count = 4;
        $exercise->rep_count = 10;
        $exercise->save();
        // cable flies
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Cable flies';
        $exercise->body_part = 'Chest';
        $exercise->set_count = 4;
        $exercise->rep_count = 12;
        $exercise->save();
        // pushups
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Pushups';
        $exercise->body_part = 'Chest';
        $exercise->set_count = 5;
        $exercise->rep_count = 20;
        $exercise->save();
    }

    // 8 exercises so far
    private function addBackExercises() {
        // pullups
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Pullups';
        $exercise->body_part = 'Back';
        $exercise->set_count = 4;
        $exercise->rep_count = 8;
        $exercise->save();
        // deadlift
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Deadlift';
        $exercise->body_part = 'Back';
        $exercise->set_count = 6;
        $exercise->rep_count = 8;
        $exercise->save();
        // Lat pull down
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Lat pull down';
        $exercise->body_part = 'Back';
        $exercise->set_count = 5;
        $exercise->rep_count = 8;
        $exercise->save();
        // Rope face pull
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Rope face pull';
        $exercise->body_part = 'Back';
        $exercise->set_count = 4;
        $exercise->rep_count = 10;
        $exercise->save();
        // Straight bar cable pull downs
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Straight bar cable pull downs';
        $exercise->body_part = 'Back';
        $exercise->set_count = 4;
        $exercise->rep_count = 10;
        $exercise->save();
        // Single arm dumbbell row
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Single arm dumbbell row';
        $exercise->body_part = 'Back';
        $exercise->set_count = 5;
        $exercise->rep_count = 8;
        $exercise->save();
        // Cable row
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Cable row';
        $exercise->body_part = 'Back';
        $exercise->set_count = 4;
        $exercise->rep_count = 10;
        $exercise->save();
        // Lower back extension
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Lower back extension';
        $exercise->body_part = 'Back';
        $exercise->set_count = 4;
        $exercise->rep_count = 15;
        $exercise->save();
    }

    // 8 exercises so far
    private function addShouldersExercises() {
        // Standing barbell shoulder press
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Standing barbell shoulder press';
        $exercise->body_part = 'Shoulders';
        $exercise->set_count = 5;
        $exercise->rep_count = 8;
        $exercise->save();
        // Seated dumbbell shoulder press
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Seated dumbbell shoulder press';
        $exercise->body_part = 'Shoulders';
        $exercise->set_count = 6;
        $exercise->rep_count = 8;
        $exercise->save();
        // Arnold press
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Arnold press';
        $exercise->body_part = 'Shoulders';
        $exercise->set_count = 5;
        $exercise->rep_count = 10;
        $exercise->save();
        // Side lateral raise
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Side lateral raise';
        $exercise->body_part = 'Shoulders';
        $exercise->set_count = 4;
        $exercise->rep_count = 10;
        $exercise->save();
        // Machine shoulder press
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Machine shoulder press';
        $exercise->body_part = 'Shoulders';
        $exercise->set_count = 5;
        $exercise->rep_count = 12;
        $exercise->save();
        // Barbell front raise - the one where arms are straight
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Barbell front raise';
        $exercise->body_part = 'Shoulders';
        $exercise->set_count = 4;
        $exercise->rep_count = 8;
        $exercise->save();
        // Cable rear delts
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Cable rear delts';
        $exercise->body_part = 'Shoulders';
        $exercise->set_count = 4;
        $exercise->rep_count = 10;
        $exercise->save();
        // Barbell shrugs
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Barbell shrugs';
        $exercise->body_part = 'Shoulders';
        $exercise->set_count = 4;
        $exercise->rep_count = 12;
        $exercise->save();
    }

    // 7 exercises so far
    private function addLegsExercises() {
        // Barbell squats
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Barbell squats';
        $exercise->body_part = 'Legs';
        $exercise->set_count = 6;
        $exercise->rep_count = 8;
        $exercise->save();
        // Bodyweight squats
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Bodyweight squats';
        $exercise->body_part = 'Legs';
        $exercise->set_count = 4;
        $exercise->rep_count = 20;
        $exercise->save();
        // Leg press
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Leg press';
        $exercise->body_part = 'Legs';
        $exercise->set_count = 5;
        $exercise->rep_count = 10;
        $exercise->save();
        // Goblet squats
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Goblet squats';
        $exercise->body_part = 'Legs';
        $exercise->set_count = 4;
        $exercise->rep_count = 12;
        $exercise->save();
        // Hamstring curls
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Hamstring curls';
        $exercise->body_part = 'Legs';
        $exercise->set_count = 4;
        $exercise->rep_count = 10;
        $exercise->save();
        // Leg extensions
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Leg extensions';
        $exercise->body_part = 'Legs';
        $exercise->set_count = 4;
        $exercise->rep_count = 10;
        $exercise->save();
        // Calf raises
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Calf raises';
        $exercise->body_part = 'Legs';
        $exercise->set_count = 4;
        $exercise->rep_count = 12;
        $exercise->save();
    }

    // 5 exercises so far
    private function addBicepsExercises() {
        // Single arm dumbbell curls
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Single arm dumbbell curls';
        $exercise->body_part = 'Biceps';
        $exercise->set_count = 4;
        $exercise->rep_count = 10;
        $exercise->save();
        // Barbell curls
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Barbell curls';
        $exercise->body_part = 'Biceps';
        $exercise->set_count = 4;
        $exercise->rep_count = 10;
        $exercise->save();
        // Hammer curls
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Hammer curls';
        $exercise->body_part = 'Biceps';
        $exercise->set_count = 4;
        $exercise->rep_count = 10;
        $exercise->save();
        // Preacher curls
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Preacher curls';
        $exercise->body_part = 'Biceps';
        $exercise->set_count = 4;
        $exercise->rep_count = 12;
        $exercise->save();
        // Straight bar cable curls
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Straight bar cable curls';
        $exercise->body_part = 'Biceps';
        $exercise->set_count = 4;
        $exercise->rep_count = 10;
        $exercise->save();        
    }

    // 5 exercises so far
    private function addTricepsExercises() {
        // Skull crushers
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Skull crushers';
        $exercise->body_part = 'Triceps';
        $exercise->set_count = 4;
        $exercise->rep_count = 10;
        $exercise->save();
        // Dumbbell overhead extension
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Dumbbell overhead extension';
        $exercise->body_part = 'Triceps';
        $exercise->set_count = 4;
        $exercise->rep_count = 15;
        $exercise->save();
        // Close grip bench press
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Close grip bench press';
        $exercise->body_part = 'Triceps';
        $exercise->set_count = 5;
        $exercise->rep_count = 8;
        $exercise->save();
        // Rope pull downs
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Rope pull downs';
        $exercise->body_part = 'Triceps';
        $exercise->set_count = 4;
        $exercise->rep_count = 12;
        $exercise->save();
        // Dips
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Dips';
        $exercise->body_part = 'Triceps';
        $exercise->set_count = 5;
        $exercise->rep_count = 15;
        $exercise->save();        
    }
}