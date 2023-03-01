<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Maintenance</title>
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
  </head>
  <body  class=" border-top-wide border-primary d-flex flex-column">
    <script src="{{asset('template/dist/js/demo-theme.min.js')}}"></script>
    <div class="page page-center">
      <div class="container-tight py-4">
        <div class="empty">
          <div class="empty-img"><img src="{{asset('template/static/illustrations/undraw_quitting_time_dm8t.svg')}}" height="128" alt="maintenance">
          </div>
          <p class="empty-title">Temporarily down for maintenance</p>
          <p class="empty-subtitle text-muted">
            Sorry for the inconvenience but we’re performing some maintenance at the moment. We’ll be back online shortly!
          </p>
          <div class="empty-action">
            <a href="{{url('/')}}" class="btn btn-primary">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M5 12l6 6" /><path d="M5 12l6 -6" /></svg>
              Take me home
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{asset('template/dist/js/tabler.min.js')}}" defer></script>
    <script src="{{asset('template/dist/js/demo.min.js')}}" defer></script>
  </body>
</html>
