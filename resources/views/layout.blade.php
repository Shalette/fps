<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>@yield('title', 'FPS')</title>   
      <link href="{{ asset('css/layout.css')}}" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">      
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
      <link href=@yield('css') rel="stylesheet">
    </head>
    <body >
    <!-- class="d-flex flex-column" -->
      <main id="page-content">
        <!-- <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand" href="{{ route('main') }}">Faculty Publication System</a>
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          @if (Auth::check())
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('publish') }}">Add Publication</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('account') }}">Account</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('change') }}">Change Password</a>
            </li> 
          @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Faculty Login</a>
            </li>
          @endif
          </ul>

          @if (Auth::check())
              <button class="btn btn-outline-light my-2 my-sm-0" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</button>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>              
          @endif    

          
        </div>
        </nav> -->

        <nav>
        <div class="nav-wrapper cyan darken-3">
          <a id="brand" class="brand-logo"  href="{{ route('main') }}">FPS</a>
          @if (Auth::check())
          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul id="menu" class="hide-on-med-and-down">
            <li class="{{ (Request::path() == 'home') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
            <li class="{{ (Request::path() == 'publications') ? 'active' : '' }}"><a href="{{ route('publish') }}">Add Publication</a></li>
            <li class="{{ (Request::path() == 'account') ? 'active' : '' }}"><a href="{{ route('account') }}">Account</a></li>           
            <li class="{{ (Request::path() == 'change-password') ? 'active' : '' }}"><a href="{{ route('change') }}">Change Password</a></li>
          </ul>  
          @else
          <ul id="menu" class="right">
            <li class="{{ (Request::path() == 'login') ? 'active' : '' }}"><a href="{{ route('login') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Faculty Login</a></li>
          </ul> 
          @endif

          @if (Auth::check())
          <ul class="right hide-on-med-and-down">
            <li><img src="{{ asset('storage/images/'.Auth::user()->profile_image) }}" alt="" class="circle responsive-img avatar"></li>
            <li><a href="{{ route('logout') }}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </li> 
          </ul>
          @endif
        </div>
      </nav>

      @if (Auth::check())
      <ul class="sidenav" id="mobile-demo">
        <br>
      <li class="center-align"><img src="{{ asset('storage/images/'.Auth::user()->profile_image) }}" alt="" class="circle responsive-img avatar"></li>
        <li class="{{ (Request::path() == 'home') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
        <li class="{{ (Request::path() == 'publications') ? 'active' : '' }}"><a href="{{ route('publish') }}">Add Publication</a></li>
        <li class="{{ (Request::path() == 'account') ? 'active' : '' }}"><a href="{{ route('account') }}">Account</a></li>
        <li class="{{ (Request::path() == 'change-password') ? 'active' : '' }}"><a href="{{ route('change') }}">Change Password</a></li>
        <li><button class="btn-flat" href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li> 
      </ul>
      @endif
        <div class="container">
          @yield('content')
        </div>
      </main>
      <footer class="page-footer cyan darken-3 center-align">
              <small>Created by Shalette D'Souza, Piyush Agarwal &amp; Sabreesh Bhatt, 2019.</small>
        </footer>
     
  
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>      
      <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
      <script src="{{ asset('js/layout.js') }}"></script>
      @yield('js')
    </body>
</html>
