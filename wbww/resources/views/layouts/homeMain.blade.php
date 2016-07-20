<!DOCTYPE html>
<html lang="en">
  <head>
    @include('includes.head')
  </head>
  <body class="home-bg">
      @yield('content')
     <script src="{{ asset('js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
  </body>
</html>