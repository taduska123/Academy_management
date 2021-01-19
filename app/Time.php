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
    public function scopeAlltimes($query)
    {
       return  $query->select(
                Time::raw("DATE_FORMAT(intership_day,'%m') as months"),
                Time::raw("DATE_FORMAT(intership_day,'%Y') as years"),
                Time::raw("DATE_FORMAT(intership_day,'%d') as days"),
                'intership_day',
                'time_from',
                'time_to',
                'type_of_time'
            )
            ->orderBy('intership_day', 'asc');
    }

    public function scopeBymonth($query, $year, $month)
    {
       return $query->select(
                Time::raw("DATE_FORMAT(intership_day,'%m') as months"),
                Time::raw("DATE_FORMAT(intership_day,'%Y') as years"),
                Time::raw("DATE_FORMAT(intership_day,'%d') as days"),
                'intership_day',
                'time_from',
                'time_to',
                'type_of_time'
            )
            ->whereYear('intership_day', $year)
            ->whereMonth('intership_day', $month)
            ->orderBy('intership_day', 'asc');
    }
    
}
