<!doctype html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

  <title>Iloilo Finest</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
  <link rel="stylesheet" href=" {{ asset('css/app.css') }} ">
  <link rel="stylesheet" href=" {{ asset('assets/css/bootstrap1.min.css') }} ">
  <link rel="stylesheet" href=" {{ asset('assets/css/material-kit.css') }} ">

  <style>
  .signup-page .wrapper .card-signup {
       margin: 25% 0 25%; 
  }
  </style>

  @yield('css')
    
</head>

<body class="signup-page">
    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container">
        </div>
    </nav>

    <div class="wrapper">
        <div class="header header-filter" style="background-image: url(' {{ asset('assets/img/wraft.jpg')  }}'); background-size: cover; background-position: top center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                        <div class="card card-signup" >


                          @yield('content')
                            
                        </div>
                    </div>
                </div>
            </div>

        
        </div>

    </div>


</body>
  

  <script src="{{ asset('js/app.js') }}"></script>

  <script src="/assets/js/jquery.min.js" type="text/javascript"></script>
  <script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="/assets/js/material.min.js"></script>
  <script src="/assets/js/nouislider.min.js" type="text/javascript"></script>
  <script src="/assets/js/material-kit.js" type="text/javascript"></script>


</html>
