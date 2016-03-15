@extends('layouts.main')

@section('head')
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>--}}
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
<h1>Register</h1>
<div class="error">
    <p class="errorMsg red"></p>
</div>
{{ Form::open(['route'=>'users.store']) }}
<ul>
    <li>
        <div>
            {{ Form::label('email', 'Email Address') }}
            {{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@gmail.com')) }} <span id="validEmail"></span>
            {{ $errors->first('email') }}
        </div>
    </li>
    <li>
        <div>
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password') }} <span id="validPassword"></span>
            {{ $errors->first('password') }}
        </div>
    </li>
    <li>
        <div>
            {{ Form::label('passwordConfirm', 'Confirm Password') }}
            {{ Form::password('passwordConfirm') }} <span id="validPassConfirm"></span>

            {{ $errors->first('passwordConfirm') }}
        </div>
    </li>
    <li>
        <div>
            {{ Form::label('captcha', 'Captcha') }}
            <div name="captcha" class="captcha">
                {{ Form::captcha() }}
                {{ $errors->first('g-recaptcha-response') }}
            </div>

        </div>
    </li>
</ul>
<div>{{ Form::submit('register', ['id'=>'submit', 'class'=>'btn btn-primary'] ) }} or {{ link_to('login', 'login')}}</div>
{{ Form::close() }}

@stop