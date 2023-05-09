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

    // 13 chest exercises
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
        // incline barbell bench press
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Incline barbell bench press';
        $exercise->body_part = 'Chest';
        $exercise->set_count = 5;
        $exercise->rep_count = 8;
        $exercise->save();
        // dumbbell incline bench press
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Incline dumbbell bench press';
        $exercise->body_part = 'Chest';
        $exercise->set_count = 5;
        $exercise->rep_count = 8;
        $exercise->save();
        // dumbbell flies
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Dumbbell flies';
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
        // standing cable flies
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Standing cable flies';
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
        // Decline barbell bench press
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Decline barbell bench press';
        $exercise->body_part = 'Chest';
        $exercise->set_count = 4;
        $exercise->rep_count = 10;
        $exercise->save();
        // Decline dumbbell bench press
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Decline dumbbell bench press';
        $exercise->body_part = 'Chest';
        $exercise->set_count = 5;
        $exercise->rep_count = 8;
        $exercise->save();
        // Incline dumbbell flies
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Incline dumbbell flies';
        $exercise->body_part = 'Chest';
        $exercise->set_count = 3;
        $exercise->rep_count = 15;
        $exercise->save();
        // Machine chest press
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Machine chest press';
        $exercise->body_part = 'Chest';
        $exercise->set_count = 4;
        $exercise->rep_count = 12;
        $exercise->save();
        // Bar dips
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Bar dips';
        $exercise->body_part = 'Chest';
        $exercise->set_count = 4;
        $exercise->rep_count = 12;
        $exercise->save();
    }

    // 13 back exercises
    private function addBackExercises() {
        // Pullups
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Pullups';
        $exercise->body_part = 'Back';
        $exercise->set_count = 4;
        $exercise->rep_count = 8;
        $exercise->save();
        // Barbell deadlift
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Barbell deadlift';
        $exercise->body_part = 'Back';
        $exercise->set_count = 6;
        $exercise->rep_count = 8;
        $exercise->save();
        // Lat pulldown
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Lat pulldown';
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
        // Seated close grip cable row
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Seated close grip cable row';
        $exercise->body_part = 'Back';
        $exercise->set_count = 4;
        $exercise->rep_count = 10;
        $exercise->save();
        // Seated wide grip cable row
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Seated wide grip cable row';
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
        $exercise->rep_count = 12;
        $exercise->save();
        // Barbell row
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Barbell row';
        $exercise->body_part = 'Back';
        $exercise->set_count = 4;
        $exercise->rep_count = 8;
        $exercise->save();
        // Dumbbell deadlift
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Dumbbell deadlift';
        $exercise->body_part = 'Back';
        $exercise->set_count = 4;
        $exercise->rep_count = 12;
        $exercise->save();
        // Kettlebell swings
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Kettlebell swings';
        $exercise->body_part = 'Back';
        $exercise->set_count = 4;
        $exercise->rep_count = 15;
        $exercise->save();
        // Machine row
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Machine row';
        $exercise->body_part = 'Back';
        $exercise->set_count = 4;
        $exercise->rep_count = 10;
        $exercise->save();
    }

    // 19 shoulder exercises
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
        // Dumbbell lateral raise
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Dumbbell lateral raise';
        $exercise->body_part = 'Shoulders';
        $exercise->set_count = 3;
        $exercise->rep_count = 12;
        $exercise->save();
        // Machine shoulder press
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Machine shoulder press';
        $exercise->body_part = 'Shoulders';
        $exercise->set_count = 5;
        $exercise->rep_count = 10;
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
        // Cable pull aparts
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Cable pull aparts';
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
        $exercise->rep_count = 15;
        $exercise->save();
        // Band pull aparts
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Band pull aparts';
        $exercise->body_part = 'Shoulders';
        $exercise->set_count = 3;
        $exercise->rep_count = 15;
        $exercise->save();
        // Plate front raise
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Plate front raise';
        $exercise->body_part = 'Shoulders';
        $exercise->set_count = 3;
        $exercise->rep_count = 10;
        $exercise->save();
        // Dumbbell front raise
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Dumbbell front raise';
        $exercise->body_part = 'Shoulders';
        $exercise->set_count = 3;
        $exercise->rep_count = 8;
        $exercise->save();
        // Barbell upright row
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Barbell upright row';
        $exercise->body_part = 'Shoulders';
        $exercise->set_count = 3;
        $exercise->rep_count = 12;
        $exercise->save();
        // Cable lateral raise
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Cable lateral raise';
        $exercise->body_part = 'Shoulders';
        $exercise->set_count = 3;
        $exercise->rep_count = 10;
        $exercise->save();
        // Standing dumbbell shoulder press
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Standing dumbbell shoulder press';
        $exercise->body_part = 'Shoulders';
        $exercise->set_count = 4;
        $exercise->rep_count = 8;
        $exercise->save();
        // Seated barbell shoulder press
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Seated barbell shoulder press';
        $exercise->body_part = 'Shoulders';
        $exercise->set_count = 4;
        $exercise->rep_count = 8;
        $exercise->save();
        // Machine lateral raise
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Machine lateral raise';
        $exercise->body_part = 'Shoulders';
        $exercise->set_count = 3;
        $exercise->rep_count = 10;
        $exercise->save();
        // Reverse dumbbell flies
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Reverse dumbbell flies';
        $exercise->body_part = 'Shoulders';
        $exercise->set_count = 3;
        $exercise->rep_count = 10;
        $exercise->save();
        // Reverse machine flies
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Reverse machine flies';
        $exercise->body_part = 'Shoulders';
        $exercise->set_count = 4;
        $exercise->rep_count = 10;
        $exercise->save();
        // Dumbbell shrugs
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Dumbbell shrugs';
        $exercise->body_part = 'Shoulders';
        $exercise->set_count = 4;
        $exercise->rep_count = 12;
        $exercise->save();
    }

    // 13 leg exercises
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
        // Walking lunges
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Walking lunges';
        $exercise->body_part = 'Legs';
        $exercise->set_count = 3;
        $exercise->rep_count = 20;
        $exercise->save();
        // Weighted lunges
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Weighted lunges';
        $exercise->body_part = 'Legs';
        $exercise->set_count = 3;
        $exercise->rep_count = 12;
        $exercise->save();
        // Bulgarian split squats
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Bulgarian split squats';
        $exercise->body_part = 'Legs';
        $exercise->set_count = 4;
        $exercise->rep_count = 8;
        $exercise->save();
        // Hip adduction and abduction machine
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Hip adduction and abduction machine';
        $exercise->body_part = 'Legs';
        $exercise->set_count = 3;
        $exercise->rep_count = 12;
        $exercise->save();
        // Single leg leg press
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Single leg leg press';
        $exercise->body_part = 'Legs';
        $exercise->set_count = 4;
        $exercise->rep_count = 10;
        $exercise->save();
        // Weighted step ups
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Weighted step ups';
        $exercise->body_part = 'Legs';
        $exercise->set_count = 3;
        $exercise->rep_count = 10;
        $exercise->save();
    }

    // 11 bicep exercises
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
        // Rope cable curls
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Rope cable curls';
        $exercise->body_part = 'Biceps';
        $exercise->set_count = 4;
        $exercise->rep_count = 10;
        $exercise->save();  
        // Reverse grip straight bar cable curls
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Reverse grip straight bar cable curls';
        $exercise->body_part = 'Biceps';
        $exercise->set_count = 3;
        $exercise->rep_count = 12;
        $exercise->save();  
        // Dumbbell concentration curls
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Dumbbell concentration curls';
        $exercise->body_part = 'Biceps';
        $exercise->set_count = 3;
        $exercise->rep_count = 8;
        $exercise->save(); 
        // Cross body hammer curl
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Cross body hammer curl';
        $exercise->body_part = 'Biceps';
        $exercise->set_count = 3;
        $exercise->rep_count = 10;
        $exercise->save(); 
        // Seated incline hammer curl
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Seated incline hammer curl';
        $exercise->body_part = 'Biceps';
        $exercise->set_count = 3;
        $exercise->rep_count = 10;
        $exercise->save(); 
        // Spider curls
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Spider curls';
        $exercise->body_part = 'Biceps';
        $exercise->set_count = 3;
        $exercise->rep_count = 12;
        $exercise->save();
    }

    // 9 tricep exercises
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
        // Tricep pulldowns with bar
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Tricep pulldowns with bar';
        $exercise->body_part = 'Triceps';
        $exercise->set_count = 3;
        $exercise->rep_count = 12;
        $exercise->save(); 
        // Overhead cable tricep extension
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Overhead cable tricep extension';
        $exercise->body_part = 'Triceps';
        $exercise->set_count = 4;
        $exercise->rep_count = 10;
        $exercise->save(); 
        // Single arm bent over dumbbell extension
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Single arm bent over dumbbell extension';
        $exercise->body_part = 'Triceps';
        $exercise->set_count = 3;
        $exercise->rep_count = 15;
        $exercise->save(); 
        // Single arm bent over cable extension
        $exercise = new Exercise();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Single arm bent over cable extension';
        $exercise->body_part = 'Triceps';
        $exercise->set_count = 3;
        $exercise->rep_count = 12;
        $exercise->save(); 
    }
}