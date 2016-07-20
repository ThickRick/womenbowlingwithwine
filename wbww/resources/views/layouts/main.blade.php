<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>WBWW | @yield('dynamic_title')</title>
        <link rel="stylesheet" href="{{ asset('css/foundation.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/schoskyStyles.css') }}" />
        <script src="{{ asset('js/vendor/modernizr.js') }}"></script>
    </head>

<body>

    <!-- Header and Nav -->
 

    <nav class="top-bar" data-topbar>
        <ul class="title-area">
            <li class="name">
                <h1><a href="/">Woman Bowling with Wine!</a></h1>
            </li>
        </ul>
        <section class="top-bar-section">
            <ul class="left">
                <li><a href="/about">About</a></li>
                <li><a href="/alley">View Alleys</a></li>
            </ul>
            <ul class="right">
                <li><a href="/signup">Sign Up</a></li>
                <li><a href="/login">Log In</a></li> 
            </ul>
        </section>
    </nav>

    @if(Session::has('message'))
        <div class="alert-box success">
        {{{Session::get('message')}}}
        </div>
    @endif
 
    <!-- End Header and Nav -->

    <div class="row">
        <div class="large-12">
            @yield('content')
        </div>
    </div>
    @yield ('test_button')
    @yield('test_button2')
 
 
    <!-- Footer -->
 
    <footer class="row">
        <div class="large-12 columns">
            <hr />
            <div class="row">
                <div class="large-6 columns">
                    <p>Footer Text, brah!</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('js/foundation.min.js') }}"></script>
    <script src="{{ asset('js/inlineEdits.js') }}"></script>
    <script>
      $(document).foundation();
    </script>
    </body>
</html>