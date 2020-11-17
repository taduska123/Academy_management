@extends('layout')
@section('content')
    
<h1>Edit {{ $trainees->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($trainees, array('route' => array('trainee.update', $trainees->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('last_name', 'Last name') }}
        {{ Form::text('last_name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('tel', 'Telephone') }}
        {{ Form::text('tel', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('position', 'Position') }}
        {{ Form::text('position', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the trainees!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@endsection