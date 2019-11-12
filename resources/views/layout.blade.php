<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>@yield('title', 'FPS')</title>
      <link href=@yield('css') rel="stylesheet">      
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
      <style>
        html, body {
            height: 100%;
          }
        #page-content {
          flex: 1 0 auto;
          padding-bottom: 2em;
        }
        #sticky-footer {
          flex-shrink: none;
        }
        .avatar {
          vertical-align: middle;
          width: 40px;
          height: 40px;
          border-radius: 50%;
          margin: 10px;
        }
      </style>
    </head>
    <body class="d-flex flex-column">
      <div id="page-content">
        <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand" href="{{ route('main') }}">Faculty Publication System</a>
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          @if (Auth::check())
            <li class="nav-item">
              <a class="nav-link" href="home">Home</a>
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
              <img src="{{asset('storage/images/'.Auth::user()->profile_image) }}" class="avatar" alt="Profile Image">
              <button class="btn btn-outline-light my-2 my-sm-0" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</button>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>              
          @endif    

          <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Type Something" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
          </form> -->
        </div>
        </nav>

        <div class="container mt-5">
          @yield('content')
        </div>
      </div>
      <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
        <div class="container text-center">
          <small>Created by Shalette D'Souza, Piyush Agarwal &amp; Sabreesh Bhat, 2019.</small>
        </div>
      </footer>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      @yield('js')    
    </body>
</html>
