<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    @yield('pagetitle')
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <style>
        .header > div, .content > div {
            border: 1px solid #ccc;
        }

        .content div {
            padding-bottom: 40px;
        }

        .content div:last-of-type {
            padding-bottom: 10px;
        }

        .content textarea {
            padding: 0px;
        }

        .image {
            border: none;
            margin: 5px 0px 5px 0px;
            text-align: center;
        }

        .content img {
            padding: 0;
            margin-bottom: 5px;
        }

        .save {
            padding: 10px;
        }
    </style>

    <script>
        // script to resize all divs to same height
        $( function() {
            var divs = $('.content > div');
            console.log(divs);

            var height = 0;
            for(var i = 0; i < divs.length; i++) {
                if( divs[i].clientHeight > height ) {
                    height = divs[i].clientHeight
                }
            }
            console.log(height);

            for(var i = 0; i < divs.length; i++) {
                divs[i].style.height = height
            }
        })
    </script>
    @yield('headers')
</head>
<body>
<div class="wrapper">
    <div class="header col-sm-12 clearfix">
        <div class="col-sm-12">
        @yield('header')
        </div>
    </div>

    <div class="content col-sm-12 clearfix">
        <div class="notes col-sm-3 clearfix">
            @yield('notes')
        </div>
        <div class="websites col-sm-3 clearfix">
            @yield('websites')
        </div>
        <div class="images col-sm-3 clearfix">
            @yield('images')
        </div>
        <div class="tbd col-sm-3 clearfix">
            @yield('tbd')
        </div>
        <div class="save col-sm-12 clearfix">
            @yield('save')
        </div>
    </div>

    <div class="footer col-sm-12 clearfix">
        @yield('footer')
    </div>
</div>
</body>
</html>