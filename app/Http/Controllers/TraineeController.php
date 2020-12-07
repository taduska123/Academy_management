<?php

namespace App\Http\Controllers;

use App\Trainee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TraineeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Trainee::latest()->get(), 200);
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
            'name' => 'required|max:199',
            'last_name' => 'required|max:199',
            'email' => 'required|email:rfc,dns',
            'tel' => 'required',
            'position' => 'required'
        ]));
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        else {
            
            // $trainee = new Trainee;
            // $trainee->name = $request->name;
            // $trainee->last_name = $request->last_name;
            // $trainee->email = $request->email;
            // $trainee->tel = $request->tel;
            // $trainee->position = $request->position;
            // $trainee->save();
            $trainee = Trainee::create($request->all());
            return response()->json($trainee, 201);
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function show(Trainee $trainee)
    {
        return response()->json($trainee, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainee $trainee)
    {
        $validator = Validator::make($request->all([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:rfc,dns',
            'tel' => 'required',
            'position' => 'required'
        ]));
        if ($validator->fails()) {
            return response()->json(422)
                        ->withErrors($validator)
                        ->withInput();
        }
        else {
        $trainee->update($request->all());
        return response()->json($trainee, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, Trainee $trainee)
    {
        $trainee->delete();
        return response()->json(null, 204);
    }
}