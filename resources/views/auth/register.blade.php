@extends('back.layouts.auth')
@section('content')

  <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
      {{ csrf_field() }}

      <div class="header header-primary text-center">
          <h4>Log In to Dashboard</h4>
          <div class="social-line">
              <a href="" class="btn btn-simple btn-just-icon">
                  <i class="fa fa-facebook-square"></i>
              </a>
              <a href="" class="btn btn-simple btn-just-icon">
                  <i class="fa fa-twitter"></i>
              </a>
              <a href="" class="btn btn-simple btn-just-icon">
                  <i class="fa fa-google-plus"></i>
              </a>
          </div>
      </div>


      <div class="content">



        <div class="input-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <span class="input-group-addon">
            <i class="material-icons">person</i>
          </span>
          <input id="name" type="text" placeholder="Name" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

          @if ($errors->has('name'))
              <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
       
        </div>




        <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <span class="input-group-addon">
            <i class="material-icons">email</i>
          </span>
            <input id="email" placeholder="Email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <span class="input-group-addon">
            <i class="material-icons">lock_outline</i>
          </span>
            <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="input-group">
            <span class="input-group-addon">
            <i class="material-icons">lock_outline</i>
          </span>
            <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required>

        </div>

      

        <div class="foot">
            <div class="text-center">                                    
              <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
            </div>
            <hr>
            <div class="text-center">            
              <small>
                <a href="{{ url('') }} ">Go Login?</a>
                <br>
              </small>   
              <br>
            </div>
        </div>



      </div>


   
  </form>

@endsection
