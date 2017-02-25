<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="Hackstak">
    <meta name="author" content="Hackstak">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ URL::asset('favicon.ico') }}" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic" rel="stylesheet">
    <link href="{{ URL::asset('css/toolkit-inverse.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/back.css') }}" rel="stylesheet">
    @yield('head')
  </head>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-3 sidebar">
          <nav class="sidebar-nav">
            <div class="sidebar-header">
              <button class="nav-toggler nav-toggler-sm sidebar-toggler" type="button" data-toggle="collapse" data-target="#nav-toggleable-sm"><span class="sr-only">Toggle nav</span></button>
              <!--<a class="sidebar-brand img-responsive" href="{{ url('/') }}"><img src="#" /></a>-->
            </div>
            <div class="collapse nav-toggleable-sm" id="nav-toggleable-sm">
              <form class="sidebar-form">
                <input class="form-control" type="text" placeholder="Search...">
                <button type="submit" class="btn-link"><span class="icon icon-magnifying-glass"></span></button>
              </form>
              <ul class="nav nav-pills nav-stacked">
                <li class="nav-header">Dashboards</li>
                @if (Request::is('dashboard'))
                  <li class="active"><a href="{{ url('/dashboard') }}">Overview</a></li>
                  <li><a href="{{ url('/dashboard/finances') }}">Finances</a></li>
                @else
                  <li><a href="{{ url('/dashboard') }}">Overview</a></li>
                  <li><a href="{{ url('/dashboard/finances') }}">Finances</a></li>

                @endif
                <li class="nav-header">My Profile</li>
                @if(Auth::check())
                  @if (Auth::user()->admin == 1)
                    @if (Request::is('admin'))
                      <li class="active"><a href="{{ url('/admin') }}">Administration</a></li>
                      <li><a href="{{ url('/dashboard/create') }}">Create Hackathon</a></li>
                      @else
                      <li><a href="{{ url('/admin') }}">Administration</a></li>
                      <li><a href="{{ url('/dashboard/create') }}">Create Hackathon</a></li>
                    @endif
                  @endif
                  @if (Request::is('profile'))
                    <li class="active"><a href="{{ url('/profile') }}">My Profile</a></li>
                  @else
                    <li><a href="{{ url('/profile') }}">My Profile</a></li>
                  @endif
                <li><a href="{{ url('/logout') }}">Log Out</a></li>
                @else
                  <li><a href="{{ url('/login') }}">Log In</a></li>
                  <li><a href="{{ url('/register') }}">Register</a></li>
                @endif
              </ul>
              <hr class="visible-xs m-t">
            </div>
          </nav>
        </div>
        @yield('content')
      </div>
    </div>
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/chart.js') }}"></script>
    <script src="{{ URL::asset('js/tablesorter.min.js') }}"></script>
    <script src="{{ URL::asset('js/toolkit.min.js') }}"></script>
    @yield('footer')
  </body>
</html>
