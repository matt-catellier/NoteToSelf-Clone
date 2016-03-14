<!doctype html>
<html>
<head>
    <title>Look at me Login</title>
</head>
<body>

@if($errors == null)
        <p> {{  $errors }} </p>s
@endif

<!--  this must specify the method somehow -->
{{ Form::open(array('route' => 'login')) }}
<h1>Login</h1>
<!-- if there are login errors, show them here -->
<p>
    {{ $errors->first('username') }}
    {{ $errors->first('password') }}
</p>

<p>
    {{ Form::label('username', 'Email Address') }}
    {{ Form::text('username', Input::old('username'), array('placeholder' => 'awesome@awesome.com')) }}
</p>

<p>
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}
</p>

<p>{{ Form::submit('Submit!') }}</p>
{{ Form::close() }}

</body>
</html>