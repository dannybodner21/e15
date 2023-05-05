<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cardio_Exercise extends Model {
    use HasFactory;

    protected $table = 'cardio_exercises';

    public function workouts() {
        # Cardio_exercise has many Workouts
        # Define a one-to-many relationship.
        return $this->hasMany('App\Models\Workout');
    }
}