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
    public function times()
    {
        return $this->hasMany(Time::class);
    }
    public function contract()
    {
       return $this->select('contract_start','contract_end');
    }
    public function scopeByidtimes($query, $id)
    {
        return $query->findorFail($id)
        ->times();
    }
    public function scopeWholename($query)
    {
        return $query->select(Trainee::raw("CONCAT_WS(' ', `name`, `last_name`) AS `whole_name`"));
    }
}

