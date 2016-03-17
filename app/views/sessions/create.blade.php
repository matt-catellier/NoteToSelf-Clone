@extends('layouts.main')

@section('head')
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>--}}
    {{ HTML::script('scripts/jquery-1.4.1.min.js') }}
    {{ HTML::script('scripts/register.js') }}
    {{ HTML::script('scripts/login.js') }}
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
        span {
            display: inline-block;
            margin-left: 5px;
            width: 16px;
            height: 16px;
        }
    </style>
@stop

@section('content')
 <!--  this must specify the method somehow -->
{{ Form::open(['route'=>'sessions.store']) }}

<h1> log in </h1>
<ul>
    <li>
        <div>
            {{ Form::label('email', 'Email Address:') }}
            @if ($email != "")
                {{ Form::text('email', $email, array('placeholder' => 'awesome@gmail.com', 'name'=>'username')) }} <span id="validEmail"></span>
            @else
                {{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@gmail.com')) }} <span id="validEmail"></span>
            @endif
        </div>
    </li>
    <li>
        <div>
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password') }}
        </div>
    </li>
    <li class="button">
        <div>{{ Form::submit('log in', ['class'=>'btn btn-primary']) }}</div>
        {{ Form::close() }}
    </li>
    <li>
        {{ link_to('users/create', 'register') }} | {{ link_to('forgot', 'forgot password') }}
    </li>
    <li>
    <a href="http://mattcatellier.com/"> mattcatellier.com </a>
    </li>
</ul>
@stop