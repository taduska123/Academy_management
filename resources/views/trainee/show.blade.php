@extends('layout')
@section('content')
    <h1>Showing {{ $trainees->name }} {{ $trainees->last_name }}</h1>
    
        <div class="jumbotron text-center">
            <h2>{{ $trainees->name }} {{ $trainees->last_name }}</h2>
            <p>
                <strong>Telephone:</strong> {{ $trainees->tel }}<br>
                <strong>Email:</strong> {{ $trainees->email }}<br>
                <strong>Position:</strong> {{ $trainees->position }}
            </p>
        </div>
@endsection