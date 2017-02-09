<div class="sidebar" data-color="purple" data-image="/assets/img/sidebar-3.jpg">
<div class="logo">
<a href="" class="simple-text">
  {{ config('app.name', 'Iloilo|Finest') }}
</a>
</div>

<div class="sidebar-wrapper">

  <div class="user" style="margin-top: 10px">
      <div class="photo">
          <img src="{{ asset('/upload/avatars/' . Auth::user()->avatar ) }}">
      </div>
      <div class="info text-center" style="margin-top: 5px">
          {{ ucwords(auth::user()->fullname)}}
      </div>
  </div>


  <ul class="nav">
      <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
          <a href="{{ url('dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
          </a>
      </li>
      <li class="{{ Request::is('profile') ? 'active' : '' }}">
          <a href="{{  url('profile') }}">
              <i class="material-icons">person</i>
              <p>User Profile</p>
          </a>
      </li>
{{--       <li class="{{ Request::is('messages') ? 'active' : '' }}">
          <a href="{{ url('messages') }}">
              <i class="material-icons">content_paste</i>
              <p>Messages</p>
          </a>
      </li> --}}

      <li class="{{ Request::is('notifications/*','notifications') ? 'active' : '' }}">
          <a href="{{ url('notifications') }}">
              <i class="material-icons text-gray">notifications</i>
              <p>Notifications</p>
          </a>
      </li>

      <li class="active-pro">
            <a href="{{ url('/logout') }}">
              <i class="material-icons">unarchive</i>
              <p>Log Out</p>
          </a>
      </li>

  </ul>
</div>
</div>