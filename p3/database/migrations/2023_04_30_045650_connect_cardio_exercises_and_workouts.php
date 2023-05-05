<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    public function up() {
        Schema::table('workouts', function (Blueprint $table) {

            # Add a new bigint field called `cardio_exercise_id` 
            # has to be unsigned (i.e. positive)
            # nullable so it's possible to have a book without a cardio_exercise
            $table->bigInteger('cardio_exercise_id')->unsigned()->nullable();

            # This field `cardio_exercise_id` is a foreign key that connects to the `id` field in the `cardio_exercises` table
            $table->foreign('cardio_exercise_id')->references('id')->on('cardio_exercises');

        });
    }

    public function down() {
        Schema::table('workouts', function (Blueprint $table) {

            # ref: http://laravel.com/docs/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('workouts_cardio_exercise_id_foreign');

            $table->dropColumn('cardio_exercise_id');
        });
    }
};