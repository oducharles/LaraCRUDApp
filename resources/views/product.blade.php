<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Product Catalogue</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="/assets/css/Pretty-Footer.css">
    <script type="text/javascript" src="{{URL::asset('js/app.js')}}"></script>
</head>

<body>
    <div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">My Products</a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active" role="presentation"><a href="#">Home </a></li>
                        <li role="presentation"><a href="#">About Us</a></li>
                        <li role="presentation"><a href="#">Categories </a></li>
                        <li role="presentation"><a href="#">Contact </a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div>
        @yield('content')
    </div>
    <script src="/assetsassets/js/jquery.min.js"></script>
    <script src="/assetsassets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>