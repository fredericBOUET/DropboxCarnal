

    <html lang="en">
  <head>
  <title>App Name - @yield('title')</title>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="838359892260-ckcvvo5tmk0g3la35uil64j76utbvt76.apps.googleusercontent.com">
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