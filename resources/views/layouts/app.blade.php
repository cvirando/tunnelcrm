<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'TunnelCRM') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <!-- CSS files -->
    <link href="{{asset('template/dist/css/tabler.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('template/dist/css/tabler-flags.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('template/dist/css/tabler-payments.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('template/dist/css/tabler-vendors.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('template/dist/css/demo.min.css')}}" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
    @yield('styles')
</head>
<body>
    <div id="app">
        <div class="page">
            <!-- Navbar -->
            <header class="navbar navbar-expand-md navbar-light d-print-none">
              <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                  <a href="{{ url('/') }}">
                    <img src="./static/logo.svg" width="110" height="32" alt=" {{ config('app.name', 'TunnelCRM') }}" class="navbar-brand-image">
                  </a>
                </h1>
                <div class="navbar-nav flex-row order-md-last">
                @guest
                    <div class="nav-item d-none d-md-flex me-3">
                        <div class="btn-list">
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="btn" target="_blank" rel="noreferrer">
                                    <svg xmlns="https://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-login" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                                        <path d="M20 12h-13l3 -3m0 6l-3 -3"></path>
                                    </svg>
                                    {{ __('Login') }}
                                </a>
                            @endif
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn" target="_blank" rel="noreferrer">
                                    <svg xmlns="https://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-key" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M14 10m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                        <path d="M21 12a9 9 0 1 1 -18 0a9 9 0 0 1 18 0z"></path>
                                        <path d="M12.5 11.5l-4 4l1.5 1.5"></path>
                                        <path d="M12 15l-1.5 -1.5"></path>
                                    </svg>
                                    {{ __('Register') }}
                                </a>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="d-none d-md-flex">
                        <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <!-- Download SVG icon from https://tabler-icons.io/i/moon -->
                        <svg xmlns="https://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>
                        </a>
                        <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <!-- Download SVG icon from https://tabler-icons.io/i/sun -->
                        <svg xmlns="https://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
                        </a>
                        <div class="nav-item dropdown d-none d-md-flex me-3">
                        <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                            <!-- Download SVG icon from https://tabler-icons.io/i/bell -->
                            <svg xmlns="https://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
                            <span class="badge bg-red"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                            <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Last updates</h3>
                            </div>
                            <div class="list-group list-group-flush list-group-hoverable">
                                <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                                    <div class="col text-truncate">
                                    <a href="#" class="text-body d-block">Example 1</a>
                                    <div class="d-block text-muted text-truncate mt-n1">
                                        Change deprecated html tags to text decoration classes (#29604)
                                    </div>
                                    </div>
                                    <div class="col-auto">
                                    <a href="#" class="list-group-item-actions">
                                        <!-- Download SVG icon from https://tabler-icons.io/i/star -->
                                        <svg xmlns="https://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                                    </a>
                                    </div>
                                </div>
                                </div>
                                <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto"><span class="status-dot d-block"></span></div>
                                    <div class="col text-truncate">
                                    <a href="#" class="text-body d-block">Example 2</a>
                                    <div class="d-block text-muted text-truncate mt-n1">
                                        justify-content:between ⇒ justify-content:space-between (#29734)
                                    </div>
                                    </div>
                                    <div class="col-auto">
                                    <a href="#" class="list-group-item-actions show">
                                        <!-- Download SVG icon from https://tabler-icons.io/i/star -->
                                        <svg xmlns="https://www.w3.org/2000/svg" class="icon text-yellow" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                                    </a>
                                    </div>
                                </div>
                                </div>
                                <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto"><span class="status-dot d-block"></span></div>
                                    <div class="col text-truncate">
                                    <a href="#" class="text-body d-block">Example 3</a>
                                    <div class="d-block text-muted text-truncate mt-n1">
                                        Update change-version.js (#29736)
                                    </div>
                                    </div>
                                    <div class="col-auto">
                                    <a href="#" class="list-group-item-actions">
                                        <!-- Download SVG icon from https://tabler-icons.io/i/star -->
                                        <svg xmlns="https://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                                    </a>
                                    </div>
                                </div>
                                </div>
                                <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span></div>
                                    <div class="col text-truncate">
                                    <a href="#" class="text-body d-block">Example 4</a>
                                    <div class="d-block text-muted text-truncate mt-n1">
                                        Regenerate package-lock.json (#29730)
                                    </div>
                                    </div>
                                    <div class="col-auto">
                                    <a href="#" class="list-group-item-actions">
                                        <!-- Download SVG icon from https://tabler-icons.io/i/star -->
                                        <svg xmlns="https://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                                    </a>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        <span class="avatar avatar-sm" style="background-image: url({{asset('/template/dist/img/tunnel.png')}})"></span>
                        <div class="d-none d-xl-block ps-2">
                            <div>{{Auth::user()->name}}</div>
                            <div class="mt-1 small text-muted">{{Auth::user()->roles[0]['name']}}</div>
                        </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="{{route('profile')}}" class="dropdown-item">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
                </div>
              </div>
            </header>
            <header class="navbar-expand-md">
              <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="navbar navbar-light">
                  <div class="container-xl">
                    <ul class="navbar-nav">
                      <li class="nav-item active">
                        <a class="nav-link" href="{{route('home')}}" >
                          <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from https://tabler-icons.io/i/home -->
                            <svg xmlns="https://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                          </span>
                          <span class="nav-link-title">
                            Dashboard
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        @role('super-admin')
                        <a class="nav-link" href="{{route('usersIndex')}}" >
                          <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from https://tabler-icons.io/i/home -->
                            <svg xmlns="https://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                          </span>
                          <span class="nav-link-title">
                            Users
                          </span>
                        </a>
                        @endrole
                      </li>
                    </ul>
                    @role('super-admin')
                    <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from https://tabler-icons.io/i/lifebuoy -->
                                    <svg xmlns="https://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M15 15l3.35 3.35" /><path d="M9 15l-3.35 3.35" /><path d="M5.65 5.65l3.35 3.35" /><path d="M18.35 5.65l-3.35 3.35" /></svg>
                                </span>
                                <span class="nav-link-title">
                                    Help
                                </span>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" rel="noopener nofollow" target="_blank" href="https://tunnelcrm.com">
                                        Website
                                    </a>
                                    <a class="dropdown-item" rel="noopener nofollow" href="mailto:hello@tunnelcrm.com">
                                        Contact Us
                                    </a>
                                    <a class="dropdown-item" href="https://github.com/cvirando/tunnelcrm" target="_blank" rel="noopener">
                                        Source code
                                    </a>
                                    <a class="dropdown-item text-pink" href="https://github.com/sponsors/robertnicjoo" target="_blank" rel="noopener">
                                        <!-- Download SVG icon from https://tabler-icons.io/i/heart -->
                                        <svg xmlns="https://www.w3.org/2000/svg" class="icon icon-inline me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                                        Sponsor project!
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    @endrole
                  </div>
                </div>
              </div>
            </header>

            <div class="page-wrapper">
              <!-- Page header -->
              <div class="page-header d-print-none">
                <div class="container-xl">
                  <div class="row g-2 align-items-center">
                    @yield('breadcrumbs')
                    @yield('pagelinks')
                  </div>
                </div>
              </div>
              <!-- Page body -->
              <div class="page-body">
                <div class="container-xl">
                    @yield('content')
                </div>
              </div>

              <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                  <div class="row text-center align-items-center flex-row-reverse">
                    <div class="col-lg-auto ms-lg-auto">
                      <ul class="list-inline list-inline-dots mb-0">
                        <li class="list-inline-item"><a href="{{route('license')}}" class="link-secondary">License</a></li>
                        <li class="list-inline-item"><a href="https://github.com/cvirando/tunnelcrm" target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
                        <li class="list-inline-item">
                          <a href="https://github.com/sponsors/robertnicjoo" target="_blank" class="link-secondary" rel="noopener">
                            <!-- Download SVG icon from https://tabler-icons.io/i/heart -->
                            <svg xmlns="https://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                            Sponsor
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                      <ul class="list-inline list-inline-dots mb-0">
                        <li class="list-inline-item">
                          Copyright &copy; {{date('Y')}}
                          <a href="https://tunnelcrm.com" rel="nofollow noopener" class="link-secondary" target="_blank">TunnelCRM</a>.
                          All rights reserved.
                        </li>
                        <li class="list-inline-item">
                          Developed by: <a href="https://irando.co.id" class="link-secondary" rel="nofollow noopener" target="_blank">
                            CV. IRANDO
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </footer>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="{{asset('template/dist/js/demo-theme.min.js')}}"></script>
    <!-- Tabler Core -->
    <script src="{{asset('template/dist/js/tabler.min.js')}}" defer></script>
    <script src="{{asset('template/dist/js/demo.min.js')}}" defer></script>
    @yield('scripts')
</body>
</html>
