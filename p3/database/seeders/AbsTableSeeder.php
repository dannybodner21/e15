<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Ab;

class AbsTableSeeder extends Seeder {

    private $faker;
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->faker = Factory::create();
        $this->addAbExercises();
    }

    // 11 ab exercises
    private function addAbExercises() {
        // situps
        $exercise = new Ab();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Situps';
        $exercise->set_count = 3;
        $exercise->rep_count = 25;
        $exercise->save();
        // hanging leg raises
        $exercise = new Ab();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Hanging leg raises';
        $exercise->set_count = 3;
        $exercise->rep_count = 10;
        $exercise->save();
        // flutter kicks
        $exercise = new Ab();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Flutter kicks';
        $exercise->set_count = 4;
        $exercise->rep_count = 20;
        $exercise->save();
        // lying leg raises
        $exercise = new Ab();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Lying leg raises';
        $exercise->set_count = 4;
        $exercise->rep_count = 12;
        $exercise->save();
        // bicycles
        $exercise = new Ab();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Bicycles';
        $exercise->set_count = 4;
        $exercise->rep_count = 20;
        $exercise->save();
        // v ups
        $exercise = new Ab();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'V ups';
        $exercise->set_count = 4;
        $exercise->rep_count = 10;
        $exercise->save();
        // Cable crunches
        $exercise = new Ab();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Cable crunches';
        $exercise->set_count = 3;
        $exercise->rep_count = 12;
        $exercise->save();
        // Hanging knee raises
        $exercise = new Ab();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Hanging knee raises';
        $exercise->set_count = 4;
        $exercise->rep_count = 10;
        $exercise->save();
        // Russian twists
        $exercise = new Ab();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Russian twists';
        $exercise->set_count = 4;
        $exercise->rep_count = 20;
        $exercise->save();
        // Machine crunches
        $exercise = new Ab();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Machine crunches';
        $exercise->set_count = 3;
        $exercise->rep_count = 15;
        $exercise->save();
        // Mountain climbers
        $exercise = new Ab();
        $exercise->created_at = $this->faker->dateTimeThisMonth();
        $exercise->updated_at = $this->faker->dateTimeThisMonth();
        $exercise->name = 'Mountain climbers';
        $exercise->set_count = 3;
        $exercise->rep_count = 20;
        $exercise->save();
    }
}