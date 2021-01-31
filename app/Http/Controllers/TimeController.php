<?php

namespace App\Http\Controllers;

use App\Time;
use App\Trainee;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($trainee_id)
    {
        $times = Trainee::byidtimes($trainee_id)->alltimes()->get();
        $totalhours = Trainee::byidtimes($trainee_id)->totalhours('practise')->get();
        return response()->json(Time::months($times,$totalhours), 200);
    }

    public function bymonth($trainee_id, Request $request)
    {
        $times = Trainee::byidtimes($trainee_id)->bymonth($request->year, $request->month)->get();
        return response()->json(Time::days_of_month($times, $request->month, $request->year), 200);
    }

    // function getRealQuery($query, $dumpIt = false)
    // {
    //     $params = array_map(function ($item) {
    //         return "'{$item}'";
    //     }, $query->getBindings());
    //     $result = Str::replaceArray('\?', $params, $query->toSql());
    //     if ($dumpIt) {
    //         dd($result);
    //     }
    //     return $result;
    // }

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
        if (!Time::check_if_times_overlap($times, $request->time_from, $request->time_to)
            ) {
            if (Time::check_if_times_is_in_5min_interval($request->time_from, $request->time_to)) {
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
                return response()->json(["message" => 'Bad times intervals! Has to be 5min intervals'], 409);
            }
        } else {
            return response()->json(["message" => 'Times overlap!'], 409);
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
        $times = Trainee::find($trainee_id)
            ->times()
            ->select('time_to', 'time_from')
            ->whereDate('intership_day', $request->intership_day)
            ->get();
        if (Time::check_if_times_overlap($times, $request->time_from, $request->time_to)
            || $times->isEmpty()) {
            if (Time::check_if_times_is_in_5min_interval($request->time_from, $request->time_to)) {
                $time = Time::findeorFail($time_id);
                $time->trainee_id = $trainee_id;
                $time->intership_day = $request->intership_day;
                $time->type_of_time = $request->type_of_time;
                $time->time_to = $request->time_to;
                $time->time_from = $request->time_from;
                $time->save();
                return response()->json($time, 200);
            } else {
                return response()->json(["message" => 'Bad times intervals! Has to be 5min intervals'], 409);
            }
        } else {
            return response()->json(["message" => 'Times overlap!'], 409);
        }
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
