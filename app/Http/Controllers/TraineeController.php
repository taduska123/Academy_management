<?php

namespace App\Http\Controllers;

use App\Trainee;
use App\User;
use Illuminate\Http\Request;
use Lcobucci\JWT\Parser;
use App\Http\Controllers\Controller;


class TraineeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $token = (new Parser())->parse(request()->header('Authorization'));
        $userId = $token->getClaim('uid');
        return response()->json(User::find($userId)->trainees()->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $token = (new Parser())->parse(request()->header('Authorization'));
        $userId = $token->getClaim('uid');
        
        $request->validate([
            'name' => 'required|max:199',
            'last_name' => 'required|max:199',
            'email' => 'required|email',
            'tel' => 'required',
            'position' => 'required'
            ]);
        
            $trainee = new Trainee;
            $trainee->user_id = $userId;
            $trainee->name = $request->name;
            $trainee->last_name = $request->last_name;
            $trainee->email = $request->email;
            $trainee->tel = $request->tel;
            $trainee->position = $request->position;
            $trainee->save();
            return response()->json($trainee, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function show($trainee_id)
    {
        return response()->json(Trainee::find($trainee_id), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $trainee_id)
    {
        $request->validate([
            'name' => 'required|max:199',
            'last_name' => 'required|max:199',
            'email' => 'required|email',
            'tel' => 'required',
            'position' => 'required'
            ]);
            $trainee = Trainee::find($trainee_id);
        $trainee->update($request->all());
        return response()->json($trainee, 200);
        
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function delete($trainee_id)
    {
        Trainee::find($trainee_id)->delete();
        return response()->json(null, 204);
    }
}