<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('exercise_workout', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            # `workout_id` and `exercise_id` will be foreign keys, so they have to be unsigned
            #  Note how the field names here correspond to the tables they will connect...
            # `workout_id` will reference the `workouts` table and `exercise_id` will reference the `exercises` table.
            $table->bigInteger('exercise_id')->unsigned();
            $table->bigInteger('workout_id')->unsigned();

            # Make foreign keys
            $table->foreign('exercise_id')->references('id')->on('exercises');
            $table->foreign('workout_id')->references('id')->on('workouts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        
        Schema::dropIfExists('exercise_workout');
    }
};