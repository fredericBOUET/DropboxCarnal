

    <html lang="en">
  <head>
  <title>App Name - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="{{$_ENV['GOOGLE_CLIENT_ID']}}">
    <script src='./js/signIn.js'></script>
    <script src="https://apis.google.com/js/api.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


  </head>
    <body>

        @if (session()->get('mail')!='')
         <a href="/logout">Sign Out</a>
        @endif

        @section('sidebar')

        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
