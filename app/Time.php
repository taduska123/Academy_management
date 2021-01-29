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
                Time::raw("TIME_FORMAT(time_from,'%H:%i') as time_from"),
                Time::raw("TIME_FORMAT(time_to,'%H:%i') as time_to"),
                'intership_day',
                'type_of_time'
            )
            ->orderBy('intership_day', 'asc')
            ->orderBy('time_from', 'asc');
    }
    public function scopeTimesfordocs($query)
    {
        return  $query->select(
            Time::raw("DATE_FORMAT(intership_day,'%Y') as years"),
            Time::raw("DATE_FORMAT(`intership_day`, '%W') as weekdays"),
            Time::raw("DATE_FORMAT(`intership_day`, '%v') as weeks"),
            Time::raw("TIME_FORMAT(time_from,'%H:%i') as time_from"),
            Time::raw("TIME_FORMAT(time_to,'%H:%i') as time_to"),
            'intership_day',
            'type_of_time'
        )
        ->orderBy('intership_day', 'asc')
        ->orderBy('time_from', 'asc');
    }
    public function scopeWeeks($query)
    {
        return  $query->select(
            Time::raw("DATE_FORMAT(intership_day,'%Y') as years"),
            Time::raw("DATE_FORMAT(`intership_day`, '%v') AS weeks"),
            Time::raw("DATE_FORMAT(`intership_day`, '%W') AS weekdays"))
            ->orderBy('intership_day', 'asc');
    }
    public function scopeBymonth($query, $year, $month)
    {
       return $query->select(
                Time::raw("DATE_FORMAT(intership_day,'%m') as months"),
                Time::raw("DATE_FORMAT(intership_day,'%Y') as years"),
                Time::raw("DATE_FORMAT(intership_day,'%d') as days"),
                Time::raw("TIME_FORMAT(time_from,'%H:%i') as time_from"),
                Time::raw("TIME_FORMAT(time_to,'%H:%i') as time_to"),
                'intership_day',
                'type_of_time'
            )
            ->whereYear('intership_day', $year)
            ->whereMonth('intership_day', $month)
            ->orderBy('intership_day', 'asc');
    }

    public function scopeTotalhours($query)
    {
        return $query->select(Time::raw("SUM(HOUR(`time_to`) - HOUR(`time_from`)) as totalhours"));
    }

    public static function months($times, $totalhours)
    {
        $monthfilter = null;
        $yearfilter = null;
        $montharray = [];
        $totaltime = ['totalhours'=>$totalhours->first(), 'times'=>[]];
        foreach ($times as $month) {

            if ($monthfilter != $month->months ||  $yearfilter != $month->years) {
                $montharray[] = [
                    'year' => $month->years,
                    'month' => $month->months,
                    'days' => [Time::days_of_month($times, $month->months, $month->years)]
                ];
                $monthfilter = $month->months;
                $yearfilter = $month->years;
            }
        }
        $totaltime['times'] = $montharray;
        return $totaltime;
    }
    public static function days_of_month($times, $month_check, $year_check)
    {

        $dayarray = [];
        $dayforfilter = null;
        foreach ($times as $day) {
            if (
                $day->months == $month_check
                && $day->years == $year_check
                && $dayforfilter != $day->days
            ) {
                $dayarray[] = [
                    'day' => $day->days, 'times' => [Time::times_of_day($times, $day->days, $month_check, $year_check)]
                ];
                $dayforfilter = $day->days;
            }
        }
        return $dayarray;
    }
    public static function times_of_day($times, $day_check, $month_check, $year_check)
    {
        $timesarray = [];
        foreach ($times as $time) {
            if (
                $time->days == $day_check
                && $time->months == $month_check
                && $time->years == $year_check
            ) {
                $timesarray[] = [
                    'time_from' => $time->time_from,
                    'time_to' => $time->time_to,
                    'type_of_time' => $time->type_of_time
                ];
            }
        }
        return $timesarray;
    }
    public static function check_if_times_is_in_5min_interval($from, $to)
    {
        if (empty(strtotime($from) % 300) && empty(strtotime($to) % 300)) {
            return true;
        } else {
            return false;
        }
    }
    public static function check_if_times_overlap($times, $from_compare, $to_compare)
    {
        $from_compare = is_int($from_compare) ? $from_compare : strtotime($from_compare);
        $to_compare = is_int($to_compare) ? $to_compare : strtotime($to_compare);
        if($from_compare >= $to_compare){ return true;}
        foreach ($times as $time) {
            $from = strtotime($time->time_from);
            $to = strtotime($time->time_to);
            if (($from >= $from_compare && $from < $to_compare) ||
                ($to > $from_compare && $to <= $to_compare)
            ) {
                return true;
            }
        }
        return false;
    }

    function getStartAndEndDate($week, $year) {
        $dto = new \DateTime();
        $dto->setISODate($year, $week);
        $ret['week_start'] = $dto->format('Y-m-d');
        $dto->modify('+6 days');
        $ret['week_end'] = $dto->format('Y-m-d');
        return $ret;
      }

      public static function weeks($times)
      {
          $weektest = null;
          $weeksarray = [];
          foreach ($times as $week) {
              if ($week->weeks != $weektest) {
                  $weeksarray[] = [
                      'week' => $week->weeks,
                       'weekdays' => [Time::weekdays($times, $week->weeks)]
                  ];
                  $weektest = $week->weeks;
              }
          }
          return $weeksarray;
      }
      public static function weekdays($times, $week)
      {
  
          $weekdayarray = [];
          $weekdayforfilter = null;
          foreach ($times as $weekday) {
              if (
                  $weekday->weeks == $week
                  && $weekdayforfilter != $weekday->weekdays
              ) {
                  $weekdayarray[] = [
                      'weekday' => $weekday->weekdays,
                      'ontimes' => Time::activehours($times, $weekday->weekdays, $week, 'practise'),
                      'offtimes' => Time::activehours($times, $weekday->weekdays, $week, 'lecture')
                  ];
                  $weekdayforfilter = $weekday->weekdays;
              }
          }
          return $weekdayarray;
      }
      public static function activehours($times, $weekday_check, $week_check, $type)
      {
          $period = "";
          foreach ($times as $time) {
              if (
                  $time->weekdays == $weekday_check
                  && $time->weeks == $week_check
                  && $time->type_of_time == $type
              ) {
                  $period = $period." ".$time->time_from." - ".$time->time_to.";";
                  ;
              }
          }
          return $period;
      }

}
