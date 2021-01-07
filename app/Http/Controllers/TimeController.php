<?php

namespace App\Http\Controllers;

use App\Time;
use App\User;
use App\Trainee;
use Illuminate\Http\Request;
use Lcobucci\JWT\Parser;
use Illuminate\Support\Facades\Validator;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $response = Trainee::findorFail($id)->get();


        //echo $token->getClaim('uid');
        //dd($user);

        //dd(request('user_id'));
        return response()->json(Trainee::findorFail($id)->times()->get(), 200);
        //return response()->json(User::find(request('user_id'))->trainees()->get(), 200);
        //return response()->json(Trainee::latest()->get(), 200);
    }
    public function bymonth($trainee_id, Request $request)
    {
        $days = Trainee::findorFail($trainee_id)
            ->times()
            ->select(Time::raw("DATE_FORMAT(intership_day,'%d') as days"), 'intership_day', 'time_from', 'time_to', 'type_of_day')
            ->whereYear('intership_day', $request->year)
            ->whereMonth('intership_day', $request->month)
            ->orderBy('intership_day', 'asc')
            ->get();
        $dayforfilter = null;
        foreach ($days as $day) {
            if ($dayforfilter != $day->days) {
                $timesarray = null;
                foreach ($days as $time) {
                    if ($time->days == $day->days) {
                        $timesarray[] = [
                            'time_from' => $time->time_from,
                            'time_to' => $time->time_to,
                            'type_of_day' => $time->type_of_day
                        ];
                        $dayforfilter = $day->days;
                    }
                }
                $daysarray[] = [
                    'days' => ['day' => $day->days, 'times' => [$timesarray]]
                ];
            }
        }

        return response()->json($daysarray, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all([
            'contract_start' => 'required',
            'contract_end' => 'required',
            'trainee_id' => 'required',
            'intership_day' => 'required|date',
            'type_of_day' => 'required',
            'time_to' => 'required|date_format:H:i',
            'time_from' => 'required|date_format:H:i'
        ]));
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $time = new Time;
            $time->trainee_id = $request->trainee_id;
            $time->intership_day = $request->intership_day;
            $time->type_of_day = $request->type_of_day;
            $time->time_to = $request->time_to;
            $time->time_from = $request->time_from;
            $time->save();
            $trainee = Trainee::findorFail($request->trainee_id);
            $trainee->contract_start = $request->contract_start;
            $trainee->contract_end = $request->contract_end;
            $trainee->save();
            //$time = Time::create($request->all());
            return response()->json($time, 201);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Time $time, $id)
    {

        $validator = Validator::make($request->all([
            'contract_start' => 'required',
            'contract_end' => 'required',
            'trainee_id' => 'required',
            'intership_day' => 'required|date',
            'type_of_day' => 'required',
            'time_to' => 'required|date_format:H:i',
            'time_from' => 'required|date_format:H:i'

        ]));
        if ($validator->fails()) {
            return response()->json(422)
                ->withErrors($validator)
                ->withInput();
        } else {
            $time = Time::fideorFail($request->$id);
            $time->trainee_id = $request->trainee_id;
            $time->intership_day = $request->intership_day;
            $time->type_of_day = $request->type_of_day;
            $time->time_to = $request->time_to;
            $time->time_from = $request->time_from;
            $time->save();
            $trainee = Trainee::findorFail($request->trainee_id);
            $trainee->contract_start = $request->contract_start;
            $trainee->contract_end = $request->contract_end;
            $trainee->save();
            $trainee->update($request->all());
            return response()->json($trainee, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, Time $time)
    {
        $time->delete();
        return response()->json(null, 204);
    }
}
