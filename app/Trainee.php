<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    protected $table = "trainees";
    protected $fillable = ['name', 'last_name', 'email', 'tel', 'position'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

