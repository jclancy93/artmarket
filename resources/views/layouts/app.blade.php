<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Art Market Now</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/app.css"></link>
    <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css"></link>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Didact+Gothic' rel='stylesheet' type='text/css'>

    <style>
        body {
            font-family: 'Lato';
            overflow: hidden;
        }

        .fa-btn {
            margin-right: 6px;
        }
        .ui-autocomplete { position: absolute; cursor: default; background:#FFF }   

    </style>

</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}" style="color: black; font-size: 30px">
                    ART MARKET NOW
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/artworks') }}" style="color: black; font-size: 16px;">ARTISTS</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/about') }}" style="color: black; font-size: 16px;">ABOUT</a></li>
                </ul>
                @if (Auth::id() == 1)
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/artworks/create') }}" style="color: black; font-size: 16px;">ADD ARTWORK</a></li>
                </ul>
                @else
                @endif
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}" style="color: black; font-size: 16px;">LOGIN</a></li>
                        <li><a href="{{ url('/register') }}" style="color: black; font-size: 16px;">SIGN UP</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: black; font-size: 20px; padding-bottom: 25px;">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.2/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="/js/app.js"></script>
    <script type="text/javascript">
     $(document).ready(function () {
      $('input:text').bind({
      });
      $("#auto").autocomplete({
     minLength:1,
     autoFocus: true,
     source: '{{URL('getdata')}}'
    });
    });
    </script>
</body>
</html>
