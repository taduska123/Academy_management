<!DOCTYPE html>
<html>
<head>
    <title>Trainee App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('trainee') }}">Trainee Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('trainee') }}">View All trainees</a></li>
            <li><a href="{{ URL::to('trainee/create') }}">Create a trainee</a>
        </ul>
    </nav>
    @yield('content')
</div>
</body>
</html>