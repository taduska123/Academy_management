<?php

namespace App\Http\Controllers;

use App\Time;
use App\Trainee;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return response()->json(Trainee::findorFail($id)->times()->get(), 200);
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
        $dayforfilter = null;
        foreach ($days as $day) {
            if ($dayforfilter != $day->days) {
                $daysarray[] = [
                    'day' => $day->days, 'times' => [$this->times($days, $day)]
                ];
            }
        }
        $result = [
            'days' => $daysarray
        ];
        return response()->json($result, 200);
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
                $dayforfilter = $day->days;
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
            ->whereDate('intership_day', $request->intership_day)
            // ->where('type_of_time', $request->type_of_time)
            ->whereTime('time_to', $request->time_to)
            ->whereTime('time_from', $request->time_from)
            ->get();
        if ($times->isEmpty()) {
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
            return response()->json(["message" => 'Times already exists!'], 409);
        }
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
        Time::findeorFail($time_id)->delete();
        return response()->json(null, 204);
    }
}
