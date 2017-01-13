<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/layout.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/homepage.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/bootstrap-datetimepicker.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/bjj.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/mma.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <!-- Scripts -->
    
    <script type="text/javascript" src="{{asset('/js/jquery-3.1.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/moment.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/transition.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/collapse.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/bootstrap-datetimepicker.js')}}"></script>
   
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="{{Request::is('bjj/*') ? 'bjj-body' : '' }} {{Request::is('mma/*') ? 'mma-body' : '' }}">
    <div id="app">
        @yield('content')
    </div>
    
</body>
</html>
