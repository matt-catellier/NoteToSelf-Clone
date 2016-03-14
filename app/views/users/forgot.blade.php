<!doctype html>
<html>
<head>
    <title>note to self - forgot password</title>
</head>
<body>
<h1>Forgot Password</h1>


{{ Form::open(['route'=>'email.store']) }}
<p>
    {{ Form::label('email', 'Email Address') }}
    {{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@gmail.com')) }}
    {{ $errors->first('email') }}
</p>
<p>{{ Form::submit('register') }}</p>
{{ Form::close() }}

</body>
</html>