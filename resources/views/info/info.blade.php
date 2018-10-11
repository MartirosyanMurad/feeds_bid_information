@extends('layouts.app')
@section('content')
<html>
<head></head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md">
            WELCOME
            {{Auth::user()->name}}
        </div>
    </div>

    {{ Form::open([
    'url' => '/getStatistics',
    'method' => 'post'
    ]) }}
    First name:<br>
    <input type="text" name="firstname" placeholder="Mickey">
    <br>
    Last name:<br>
    <input type="text" name="lastname" placeholder="Mouse">
    <br><br>
    <input type="submit" value="Submit">
    {{ Form::close() }}
</div>
</body>
</html>
    @endsection