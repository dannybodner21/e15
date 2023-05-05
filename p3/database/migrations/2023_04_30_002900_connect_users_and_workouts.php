<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    public function up() {
        Schema::table('workouts', function (Blueprint $table) {

            # Add a new bigint field called `user_id` 
            # has to be unsigned (i.e. positive)
            $table->bigInteger('user_id')->unsigned();

            # This field `user_id` is a foreign key that connects to the `id` field in the `users` table
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    public function down() {
        Schema::table('workouts', function (Blueprint $table) {

            # ref: http://laravel.com/docs/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('workouts_user_id_foreign');

            $table->dropColumn('user_id');
        });
    }
    
};