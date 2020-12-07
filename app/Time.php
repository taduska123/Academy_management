<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $table = "times";
    protected $fillable = [ 'laikas_nuo', 'laikas_iki'];

    public function trainee()
    {
        return $this->belongsTo(Trainee::class);
    }
}
