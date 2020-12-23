

    <html lang="en">
  <head>
  <title>App Name - @yield('title')</title>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="client_ID_GOOGLE_OATH.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="./js/signIn.js"></script>
  </head>
    <body>
        @section('sidebar')
            
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>