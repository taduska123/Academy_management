<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $table = "times";
    protected $fillable = [ 
    'trainee_id',
    'intership_day',
    'type_of_day',
    'time_to',
    'time_from'];

    public function trainee()
    {
        return $this->belongsTo(Trainee::class);
    }
}
