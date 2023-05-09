<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model {
    use HasFactory;

    public function user() {
        // Workout belongs to User
        // Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Models\User');
    }

    public function cardio_exercise() {
        // Workout belongs to Cardio_Exercise
        // Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Models\Cardio_Exercise');
    }

    public function exercises() {
        return $this->belongsToMany('App\Models\Exercise')
            ->withTimestamps(); // Must be added to have Eloquent update the created_at/updated_at columns in a pivot table
    }

    public function abs() {
        return $this->belongsToMany('App\Models\Ab')
            ->withTimestamps(); // Must be added to have Eloquent update the created_at/updated_at columns in a pivot table
    }

}