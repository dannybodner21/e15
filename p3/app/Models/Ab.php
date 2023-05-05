<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ab extends Model
{
    use HasFactory;

    public function workouts() {
        return $this->belongsToMany('App\Models\Workout')
            ->withTimestamps(); # Must be added to have Eloquent update the created_at/updated_at columns in a pivot table
    }
}