@extends('back.layouts.auth')

@section('content')

  <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">

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

        <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}"">

          <span class="input-group-addon">
            <i class="material-icons">email</i>
          </span>
          <input id="email" name="email" type="text" class="form-control" placeholder="Email..." value="{{ old('email') }}" required autofocus>

          @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif
        </div>

        <div class="input-group {{ $errors->has('password') ? ' has-error' : '' }}">
          <span class="input-group-addon">
              <i class="material-icons">lock_outline</i>
          </span>
          <input id="password"  name="password"  type="password" placeholder="Password..." class="form-control" value="{{ old('password') }}" required/>

          @if ($errors->has('password'))
              <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
        </div>

        <div class="checkbox ">
          <label>
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} checked>
            Remember Me?
          </label>
        </div>
      </div>

      <div class="foot">
          <div class="text-center">                                    
            <button type="submit" class="btn btn-primary btn-lg btn-block">Proceed</button>
          </div>
          <hr>
          <div class="text-center">            
            <small>
              <a href="{{ url('register') }} ">Register?</a>
              <br>
            </small>   
            <br>
          </div>
      </div>
  </form>

@endsection
