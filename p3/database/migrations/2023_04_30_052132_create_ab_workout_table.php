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

        Schema::create('ab_workout', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            # `ab_id` and `workout_id` will be foreign keys, so they have to be unsigned
            #  Note how the field names here correspond to the tables they will connect...
            # `ab_id` will reference the `abs` table and `workout_id` will reference the `workouts` table.
            $table->bigInteger('ab_id')->unsigned();
            $table->bigInteger('workout_id')->unsigned();

            # Make foreign keys
            $table->foreign('ab_id')->references('id')->on('abs');
            $table->foreign('workout_id')->references('id')->on('workouts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

        Schema::dropIfExists('ab_workout');
    }
};