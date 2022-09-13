<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects_Employees extends Model
{
    use HasFactory;

    public function employees(){
        return $this->belongsToMany('Employees');
    }

    public function projects(){
        return $this->belongsToMany('Projects');
    }
}
