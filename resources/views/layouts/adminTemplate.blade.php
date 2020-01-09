<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel')}} | @yield('title')</title>

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet">
</head>
<body>
<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <a href="{{url('/')}}"><div class="sidebar-heading maroon">{{config('app.name')}}</div></a>
        <div class="list-group list-group-flush">
            <a href="{{url('/admin')}}" class="list-group-item list-group-item-action bg-light">Dashboard</a>
            <a href="{{url('/categories')}}" class="list-group-item list-group-item-action bg-light">Categories</a>
            <a href="{{url('/menu')}}" class="list-group-item list-group-item-action bg-light">Menu</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->
    <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn maroon mb-1" id="menu-toggle">Toggle Menu</button>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            </div>
        </nav>

    <!-- Page Content -->
    <div id="page-content-wrapper">


        <div class="container mt-5">
            @yield('content')
        </div>
    </div>
    </div>

</div>


<!-- Menu Toggle Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $('input[name=quick-finder]').bind('keyup',function () {
        let val = $(this).val().toLowerCase();
        $('.record').hide();

        $('.record').each(function () {
            let text = $(this).text().toLowerCase();
            if(text.indexOf(val) != -1){
                $(this).show();
            }
        })

    });

</script>

</body>

</html>
