<!DOCTYPE html>
<html lang="en">
  <head>
    @include('includes.head')
  </head>
  <body class="common-bg">
  	@include('includes.commonNav')
  	<div class="container" id= "common-wrapper">
      @yield('content')
    </div>
    <footer class="container">
        @include('includes.footer')
    </footer>
     <script src="{{ asset('js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/alleySelect.js') }}"></script>
    <script src="{{ asset('js/infoConfirm.js') }}"></script>
    <script src="{{ asset('js/bootstrap-editable.js') }}"></script>
    <script src="{{ asset('js/userEdits.js') }}"></script>
    <script src="{{ asset('js/inlineEdits.js') }}"></script>
  </body>
</html>