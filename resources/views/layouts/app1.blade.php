<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Art Market</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/app.css"></link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Didact+Gothic' rel='stylesheet' type='text/css'>

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="/js/url.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    var url = location.href.toString();
    var oldParam = purl(url).param('sortBy');
    function sortBy (value) {
        if (document.URL.indexOf('sortBy') == -1 && document.URL.indexOf('dbField') == -1) {
            var data = window.location + '?query=&dbField=artist_lastname&sortBy=' + value; 
            window.location = data;
        }  else if (document.URL.indexOf('sortBy') == -1) {
            var data = window.location + '&sortBy=' + value; 
            window.location = data;
        } 
        else {
            url = url.replace('sortBy=' + oldParam, 'sortBy=' + value);
            window.location = url;
            return value;
        } 
    };

    window.onload = function() {
        alert(oldParam);
        $("select[name='sortTerm']").find("option[value='"+oldParam+"']").prop("selected",true);
        var text = $('#searchFor').text();
        var newText = text.replace("_", " ");
        $('#searchFor').html(newText);
    };
</script>
</head>
<body class="app-layout1" style="background-color: #fff">
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
                    ART MARKET
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <div>
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/') }}" style="color: black; font-size: 16px;">HOME</a></li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/artworks') }}" style="color: black; font-size: 16px;">ARTISTS</a></li>
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

		<div class="col-sm-3 col-md-3 pull-right">
		<form class="navbar-form" role="search" action="/search" >
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Search" name="query" id="srch-term">
            <input type="hidden" name="dbField" value="artist_fullname">
			<span class="input-group-btn">
                <button class="btn btn-primary" type="submit" style="margin-top: 0px;"><i class=" glyphicon glyphicon-search"></i></button>
            </span>
		</div>
		</form>
		</div>
		
	</div>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}


</body>
</html>
