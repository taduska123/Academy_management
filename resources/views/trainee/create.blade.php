@extends('layout')
@section('content')
    

<h1>Create a trainee</h1>

<!-- if there are creation errors, they will show here -->
<ul>{{ $errors->all() }}</ul>

{{ Form::open(array('url' => 'trainees')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('last_name', 'Last Name') }}
        {{ Form::email('last_name', Input::old('last_name'), array('class' => 'form-control')) }}
    </div>
    

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
    </div>


    <div class="form-group">
        {{ Form::label('tel', 'Telephone') }}
        {{ Form::email('tel', Input::old('tel'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('position', 'Position') }}
        {{ Form::email('position', Input::old('position'), array('class' => 'form-control')) }}
    </div>
    

    {{ Form::submit('Create the trainee!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@endsection