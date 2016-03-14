<!doctype html>
<html>
<head>
    <title>note to self - register</title>
</head>
<body>
<h1>Register</h1>

{{ Form::open(['route'=>'users.store']) }}
<p>
    {{ Form::label('email', 'Email Address') }}
    {{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@gmail.com')) }}
    {{ $errors->first('email') }}
</p>

<p>
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}
    {{ $errors->first('password') }}
</p>

<p>
    {{ Form::label('passwordConfirm', 'Confirm Password') }}
    {{ Form::password('passwordConfirm') }}

    {{ $errors->first('passwordConfirm') }}
</p>

<p>
    {{ Form::captcha() }}
    {{ $errors->first('g-recaptcha-response') }}
</p>
<p>{{ Form::submit('register') }}</p>
{{ Form::close() }}

</body>
</html>