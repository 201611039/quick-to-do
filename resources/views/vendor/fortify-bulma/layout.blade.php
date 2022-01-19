<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="has-navbar-fixed-top">
<div id="app">
    <main class="container-fluid">
        @auth
        <nav class="navbar is-light is-fixed-top" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
              <a class="navbar-item" href="https://bulma.io">
                <strong>MY TO DAY</strong>
              </a>

              <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
              </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
              <div class="navbar-start">
                <a class="navbar-item is-active" href="{{ url('dashboard') }}">
                  Dashboard
                </a>

{{--
                <div class="navbar-item has-dropdown is-hoverable">
                  <a class="navbar-link">
                    More
                  </a>

                  <div class="navbar-dropdown">
                    <a class="navbar-item">
                      About
                    </a>
                    <a class="navbar-item">
                      Jobs
                    </a>
                    <a class="navbar-item">
                      Contact
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item">
                      Report an issue
                    </a>
                  </div>
                </div> --}}
              </div>

              <div class="navbar-end">
                <div class="navbar-item">
                    <span class="mr-4">Hi {{ request()->user()->name }}</span>
                  <div class="buttons">
                    {{-- <a class="button is-primary">
                      <strong>Sign up</strong>
                    </a> --}}
                    <a class="button is-danger" onclick="document.getElementById('logout').submit()">
                      Log Out
                    </a>
                    <form id="logout" action="{{ route('logout') }}" method="post" hidden>@csrf</form>
                  </div>
                </div>
              </div>
            </div>
          </nav>




          <div>
              @yield('content')
          </div>
          <script src="{{ asset('js/jquery.js') }}"></script>

          @stack('js')
        @endauth





        @guest
            <div class="columns is-centered">
                <div class="column is-half">
                    @yield('content')
                </div>
            </div>
        @endguest
    </main>
</div>
</body>
</html>
