<!doctype html>
<html>
<head>
    <title>Note to Self</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    {{ HTML::style('styles/site.css') }}
    @yield('head')
</head>
<body>
    <div class="wrapper">
    @yield('content')
    </div>
</body>
</html>