@extends('layout')
@section('content')
    

<h1>Create a trainee</h1>

<!-- if there are creation errors, they will show here -->
{{-- <ul>{{ $errors->all() }}</ul> --}}


    <form action="/trainee" method="POST">
        @csrf


        <div class="form-group @error('name') p-3 mb-2 bg-danger text-white @enderror">
            <label for="name">Name</label>
            <input type="text"
        class="form-control" name="name" id="name" value="{{old('name')}}">
        </div>
            
            
        <div class="form-group @error('last_name') p-3 mb-2 bg-danger text-white @enderror">
            <label for="last_name">Last Name</label>
            <input type="text"
        class="form-control" name="last_name" id="last_name" value="{{old('last_name')}}">
        </div>
        
        <div class="form-group @error('email') p-3 mb-2 bg-danger text-white @enderror">
            <label for="email">Email</label>
            <input type="text"
        class="form-control" name="email" id="email" value="{{old('email')}}">
        </div>

        <div class="form-group @error('tel') p-3 mb-2 bg-danger text-white @enderror">
            <label for="tel">Telephone</label>
            <input type="text"
        class="form-control" name="tel" id="tel" value="{{old('tel')}}">
        </div>

        <div class="form-group @error('position') p-3 mb-2 bg-danger text-white @enderror">
            <label for="position">Position</label>
            <input type="text"
        class="form-control" name="position" id="position" value="{{old('position')}}">
        </div>  

        <button type="submit" class="btn btn-primary" >Submit</button>
    </form>

@endsection