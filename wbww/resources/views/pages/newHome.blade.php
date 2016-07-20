@extends('layouts.homeMain')
@section('content')
	<div class="container" id="home_top">
		<div class="row">
				<div class="col-xs-6" id="main_logo">
					<img src="/img/WBWW-Logo-Stacked.png">
				</div>
				<div class="col-xs-5" id="home_message">
					<h2 id="home_title"><span class="text-nowrap">Hey Ladies!</span></h2>
					<p><span class="text-nowrap">Are you ready to spend some time with your<br> girlfriends and get away from the stress of home,<br> work, and life for just an hour or two each week?<br> Women Bowling With Wine is for you!<br></span></p>
					<a href='/signup' class="btn btn-default btn-lg"><strong>GET STARTED!</strong></a>
			</div>
		</div>
	</div>
	<div class="container" id="home_nav">
      	<a href='/signup' class="btn btn-default navbar-btn"id="left_nav">SIGN UP</a>
      	<a href="/faqs" class="btn btn-default navbar-btn" id="middle_nav">FAQS</a>
      	<a href="auth/login" class="btn btn-default navbar-btn"id="right_nav">LOGIN</a>
    </div>
</div>
	</div>
	<div class="container" id="home_bottom">
		<h1 class="bottom_title">How It Works</h1>
		<div class="row row-centered">
			<div class="col-sm-4 col-centered">
				<div class="home_info">
					<h4>SIGN UP!</h4>
					<p>Blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah</p>
				</div>
			</div>
			<div class="col-sm-4 col-centered">
				<div class="home_info">
					<h4>INVITE YOUR FRIENDS!</h4>
					<p>Blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah</p>
				</div>
			</div>
			<div class="col-sm-4 col-centered">
				<div class="home_info">
					<h4>GO BOWLING!</h4>
					<p>Blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah</p>
				</div>
			</div>
		</div>
		<h1 class="bottom_title">Featured On</h1>
		<div class="row">
			<div class="col-xs-3 col-xs-offset-1">
				<div class="tv-pic">
					<img src="/img/TodayShow.png">
				</div>
			</div>
			<div class="col-xs-3">
				<div class="tv-pic">
					<img src="/img/AsSeenOnTv.png">
				</div>
			</div>
		</div>
	</div>
	<footer class="container">
        @include('includes.footer')
    </footer>
	
@stop