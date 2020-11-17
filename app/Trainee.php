<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    protected $fillable = ['name', 'last_name', 'email', 'tel', 'position'];
}
