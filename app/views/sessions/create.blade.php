<!doctype html>
<html>
<head>
    <title>note to self - login</title>
</head>
<body>

<!--  this must specify the method somehow -->
{{ Form::open(['route'=>'sessions.store']) }}
<h1> log in </h1>

<p>
    {{ Form::label('email', 'Email Address:') }}
    {{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@gmail.com')) }}
</p>

<p>
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}
</p>

<p>{{ Form::submit('log in') }}</p>
{{ Form::close() }}

{{ link_to('users/create', 'register') }} | <a href="#"> forgot</a> <br> <br>
<a href="http://mattcatellier.com/"> mattcatellier.com </a>
</body>
</html>