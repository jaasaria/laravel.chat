<!DOCTYPE html>
<html lang="en">
  <head>

    <title>{{ config('app.name', 'Iloilo|Finest') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta  name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href=" {{ asset('css/app.css') }} ">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/css/material-dashboard.css" rel="stylesheet"/>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href=" {{ asset('css/toastr.min.css') }} ">


    @yield('css')

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>


  </head>

<body>

    <div class="wrapper" id="app">
      
            @include('back.layouts.admin_sidebar')
            <div class="main-panel">
                @include('back.layouts.admin_header')
                @include('back.layouts.admin_content')
                @include('back.layouts.admin_footer')
                @include('closure.toastr')
            </div>
            
    </div>
     <audio id="noty_audio">
        <source src="{{ asset('audio/notify.mp3') }}">
        <source src="{{ asset('audio/notify.ogg') }}">
        <source src="{{ asset('audio/notify.m4r') }}">
    </audio>

        

</body>

    <script>
        window.Laravel = { csrfToken: '{{ csrf_token() }}'};
    </script>
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="/assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
    <script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>  
    <script src="/assets/js/material.min.js" type="text/javascript"></script>
    <script src="/assets/js/material-dashboard.js"></script>

    <script src="{{ asset('js/toastr.min.js') }}"></script>

    @yield('js')
    @stack('scripts')

</html>

