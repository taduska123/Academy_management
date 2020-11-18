<?php

namespace App\Http\Controllers;

use App\Trainee;
use Illuminate\Http\Request;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trainee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trainees = Trainee::create($request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'tel' => 'required',
            'position' => 'required'
        ]));
       return response()->json($trainees, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function show(Trainee $trainees)
    {
        return response()->json($trainees, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainee $trainees)
    {
        return view('trainee.edit', compact('trainees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainee $trainees)
    {
        $trainees->update($request->all());
        // validate([
        //     'name' => 'required',
        //     'last_name' => 'required',
        //     'email' => 'required',
        //     'tel' => 'required',
        //     'position' => 'required'
        // ]));
       return response()->json($trainees, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, Trainee $trainees)
    {
        $trainees->delete();
        return response()->json(null, 204);
    }
}