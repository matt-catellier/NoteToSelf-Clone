@extends('layouts.main')
@section('head')
{{ HTML::script('scripts/jquery-1.4.1.min.js') }}
{{ HTML::script('scripts/register.js') }}
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
    <h1>Reset your Password</h1>
    <p>Type your email address in the text box below. A new password will be sent to your email address.</p>

    {{ Form::open(['route'=>'email.store']) }}
    <ul>
        <li>
            {{ Form::label('email', 'Email Address') }}
            {{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@gmail.com')) }} <span id="validEmail"></span>
            {{ $errors->first('email') }}
        </li>
        <li class="button">
            {{ Form::submit('register', ['class'=>'btn btn-primary']) }}
        </li>
    </ul>
    {{ Form::close() }}
@stop

