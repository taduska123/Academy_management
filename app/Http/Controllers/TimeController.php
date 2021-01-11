<?php

namespace App\Http\Controllers;

use App\Time;
use App\Trainee;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($trainee_id)
    {
        //return response()->json(Trainee::findorFail($id)->times()->get(), 200);
        $months = Trainee::findorFail($trainee_id)
            ->times()
            ->select(Time::raw("DATE_FORMAT(intership_day,'%m') as months") ,Time::raw("DATE_FORMAT(intership_day,'%d') as days"), 'intership_day', 'time_from', 'time_to', 'type_of_time')
            ->orderBy('intership_day', 'asc')
            ->get();
            foreach ($months as $month) {
                if (null != $month->months) {
                    $monthsarray[] = [
                        'month' => $month->months, 'days' => [$this->days($months)]
                    ];
                }
            }
            $result = [
                'months' => $monthsarray
            ];
        return response()->json($result, 200);
    }

    public function bymonth($trainee_id, Request $request)
    {
        $days = Trainee::findorFail($trainee_id)
            ->times()
            ->select(Time::raw("DATE_FORMAT(intership_day,'%d') as days"), 'intership_day', 'time_from', 'time_to', 'type_of_time')
            ->whereYear('intership_day', $request->year)
            ->whereMonth('intership_day', $request->month)
            ->orderBy('intership_day', 'asc')
            ->get();
        
        return response()->json($this->days($days), 200);
    }
    private function days($days)
    {
        foreach ($days as $day) {
            if (null != $day->days) {
                $daysarray[] = [
                    'day' => $day->days, 'times' => [$this->times($days, $day)]
                ];
            }
        }
        $result = [
            'days' => $daysarray
        ];
        return $result;
    }
    private function times($days, $day)
    {
        foreach ($days as $time) {
            if ($time->days == $day->days) {
                $timesarray[] = [
                    'time_from' => $time->time_from,
                    'time_to' => $time->time_to,
                    'type_of_time' => $time->type_of_time
                ];
            }
        }
        return $timesarray;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $trainee_id)
    {

        $request->validate([
            'contract_start' => 'required',
            'contract_end' => 'required',
            'intership_day' => 'required|date',
            'type_of_time' => 'required',
            'time_to' => 'required|date_format:H:i',
            'time_from' => 'required|date_format:H:i'
        ]);
        $times = Trainee::find($trainee_id)
            ->times()
            ->select('time_to', 'time_from')
            ->whereDate('intership_day', $request->intership_day)
            ->get();
        if (!$this->check_if_times_overlap($times, $request->time_from, $request->time_to
        || $times->isEmpty() )) {
            $time = new Time;
            $time->trainee_id = $trainee_id;
            $time->intership_day = $request->intership_day;
            $time->type_of_time = $request->type_of_time;
            $time->time_to = $request->time_to;
            $time->time_from = $request->time_from;
            $time->save();
            $this->set_contract_dates($trainee_id, $request);
            return response()->json($time, 201);
        } else {
            return response()->json(["message" => 'Times overlap!'], 409);
        }
    }

    private function check_if_times_overlap($times, $from_compare, $to_compare)
    {
        $from_compare = is_int($from_compare) ? $from_compare : strtotime($from_compare);
        $to_compare = is_int($to_compare) ? $to_compare : strtotime($to_compare);
        foreach ($times as $time)
        {
            // dd($time->time_from);
            $from = strtotime($time->time_from);
            $to = strtotime($time->time_to);
            //dd($from, $from_compare, $to, $to_compare);
            if (($from >= $from_compare && $from < $to_compare) ||
            ($to > $from_compare && $to <= $to_compare)){
                return true;
            }
            
        }
         return false;
            
    }

    public function set_contract_dates($trainee_id, Request $request)
    {
        $trainee = Trainee::findorFail($trainee_id);
        $trainee->contract_start = $request->contract_start;
        $trainee->contract_end = $request->contract_end;
        $trainee->save();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $trainee_id, $time_id)
    {
        $request->validate([
            'intership_day' => 'required|date',
            'type_of_time' => 'required',
            'time_to' => 'required|date_format:H:i',
            'time_from' => 'required|date_format:H:i'
        ]);

        $time = Time::findeorFail($time_id);
        $time->trainee_id = $trainee_id;
        $time->intership_day = $request->intership_day;
        $time->type_of_time = $request->type_of_time;
        $time->time_to = $request->time_to;
        $time->time_from = $request->time_from;
        $time->save();
        return response()->json($time, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function delete($time_id)
    {
        Time::find($time_id)->delete();
        return response()->json(null, 204);
    }
}
