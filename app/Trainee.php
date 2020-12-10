<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    protected $table = "trainees";
    protected $fillable = [
        'user_id',
        'name', 
        'last_name', 
        'email', 
        'tel', 
        'position', 
        'contract_start', 
        'contract_end'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}

