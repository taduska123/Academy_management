@extends('layout')
@section('content')
    

<h1>All the trainees</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Last_name</td>
            <td>Email</td>
            <td>Telephone</td>
            <td>Position</td>
        </tr>
    </thead>
    <tbody>
    @foreach($trainees as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->last_name }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->tel }}</td>
            <td>{{ $value->position }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the trainee (uses the destroy method DESTROY /trainees/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the trainee (uses the show method found at GET /trainees/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('trainee/' . $value->id) }}">Show this trainee</a>

                <!-- edit this trainee (uses the edit method found at GET /trainees/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('trainee/' . $value->id . '/edit') }}">Edit this trainee</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection