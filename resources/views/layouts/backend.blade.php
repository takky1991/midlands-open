<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Midlands Open Backend</title>

    <!-- Styles -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-datetimepicker.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/backend.css')}}" rel="stylesheet">
    <link href="{{asset('css/simple-sidebar.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script type="text/javascript" src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/moment.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/transition.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/collapse.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/bootstrap-datetimepicker.js')}}"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        @yield('content')
    </div>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>
</html>