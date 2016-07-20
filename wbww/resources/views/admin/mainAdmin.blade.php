@extends('layouts.common')
@section('content')
	<div class="title">
		<h1>{{{$data['alley']-> alley_name}}} Admin Page</h1>
	</div>
	<div class="admin-common">
		<h2>Manage Alley Information</h2><br>
		<div class="row">
			<div class="col-xs-4">
				<h4>Alley Name</h4>
				<a href='#' id="admin_name"><h4><strong>{{{$data['alley']-> alley_name}}}</strong></h4></a>
				<div id="admin_name_edit" style="display:none">
					{!!Form::open(array('route' => array('updateAlley', $data['alley']-> id))) !!}
						<input type="text" name="alley_name" class="form-control input-lg" id="admin_name_edit">
						<input type="submit" value='EDIT' class="btn btn-default btn-sm" id='adminButton'>
						<input type="button" value='CANCEL' class="btn btn-default btn-sm" id='admin_name_cancel'>
					{!!Form::close()!!}
				</div>
			</div>
			<div class="col-xs-4">
				<h4>Address</h4>
				<a href='#' id="admin_address"><h4><strong>{{{$data['alley']-> alley_address}}}</strong></h4></a>
				<div id="admin_address_edit" style="display:none">
					{!!Form::open(array('route' => array('updateAlley', $data['alley']-> id))) !!}
						<input type="text" name="alley_address" class="form-control input-lg" id="admin_address_edit">
						<input type="submit" value='EDIT' class="btn btn-default btn-sm" id='adminButton'>
						<input type="button" value='CANCEL' class="btn btn-default btn-sm" id='admin_address_cancel'>
					{!!Form::close()!!}
				</div>
			</div>
			<div class="col-xs-4">
				<h4>Alley City</h4>
				<a href='#' id="admin_city"><h4><strong>{{{$data['alley']-> alley_city}}}</strong></h4></a>
			</div>
			<div class= "col-xs-4" id="admin_city_edit" style="display:none">
					{!!Form::open(array('route' => array('updateAlley', $data['alley']-> id))) !!}
						<input type="text" name="alley_city" class="form-control input-lg" id="admin_city_edit">
						<input type="submit" value='EDIT' class="btn btn-default btn-sm" id='adminButton'>
						<input type="button" value='CANCEL' class="btn btn-default btn-sm" id='admin_city_cancel'>
					{!!Form::close()!!}
			</div>
		</div>
		<div class="row">
			<div class="col-xs-4">
				<h4>State</h4>
				<a href='#' id="admin_state"><h4><strong>{{{$data['alley']-> alley_state}}}</strong></h4></a>
				<div class="admin_form" id="admin_state_edit" style="display:none">
					{!!Form::open(array('route' => array('updateAlley', $data['alley']-> id))) !!}
						<input type="text" name="alley_state" class="form-control input-lg" id="admin_state_edit">
						<input type="submit" value='EDIT' class="btn btn-default btn-sm" id='adminButton'>
						<input type="button" value='CANCEL' class="btn btn-default btn-sm" id='admin_state_cancel'>
					{!!Form::close()!!}
				</div>
			</div>
			<div class="col-xs-4">
				<h4>Zip Code</h4>
				<a href='#' id="admin_zip"><h4><strong>{{{$data['alley']-> alley_zip}}}</strong></h4></a>
				<div id="admin_zip_edit" style="display:none">
					{!!Form::open(array('route' => array('updateAlley', $data['alley']-> id))) !!}
						<input type="text" name="alley_zip" class="form-control input-lg" id="admin_zip_edit">
						<input type="submit" value='EDIT' class="btn btn-default btn-sm" id='adminButton'>
						<input type="button" value='CANCEL' class="btn btn-default btn-sm" id='admin_zip_cancel'>
					{!!Form::close()!!}
				</div>
			</div>
			<div class="col-xs-4">
				<h4>Phone Number</h4>
				<a href='#' id="admin_phone"><h4><strong>{{{$data['alley']-> alley_phone}}}</strong></h4></a>
				<div id="admin_phone_edit" style="display:none">
				{!!Form::open(array('route' => array('updateAlley', $data['alley']-> id))) !!}
						<input type="text" name="alley_pphone" class="form-control input-lg" id="admin_phone_edit">
						<input type="submit" value='EDIT' class="btn btn-default btn-sm" id='adminButton'>
						<input type="button" value='CANCEL' class="btn btn-default btn-sm" id='admin_phone_cancel'>
					{!!Form::close()!!}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-4">
				<h4>Price</h4>
				<a href='#' id="admin_price"><h4><strong>${{{$data['alley']-> alley_price}}}</strong></h4></a>
				<div id="admin_price_edit" style="display:none">
					{!!Form::open(array('route' => array('updateAlley', $data['alley']-> id))) !!}
						<input type="text" name="alley_price" class="form-control input-lg" id="admin_price_edit">
						<input type="submit" value='EDIT' class="btn btn-default btn-sm" id='adminButton'>
						<input type="button" value='CANCEL' class="btn btn-default btn-sm" id='admin_price_cancel'>
					{!!Form::close()!!}
				</div>
			</div>
			<div class="col-xs-4">
				<h4>League Event Date</h4>
				<a href='#' id="admin_date"><h4><strong>{{{$data['alley']-> alley_date}}}</strong></h4></a>
				<div id="admin_date_edit" style="display:none">
					{!!Form::open(array('route' => array('updateAlley', $data['alley']-> id))) !!}
						<input type="date" name="alley_date" class="form-control input-lg" id="admin_date_edit">
						<input type="submit" value='EDIT' class="btn btn-default btn-sm" id='adminButton'>
						<input type="button" value='CANCEL' class="btn btn-default btn-sm" id='admin_date_cancel'>
					{!!Form::close()!!}
				</div>
			</div>
			<div class="col-xs-4">
				<h4>Username</h4>
				<a href='#' id="admin_username"><h4><strong>{{{$data['admin']-> username}}}</strong></h4></a>
			</div>
		</div><br>
		<h2>Manage Teams</h2><br>
		@if(count($data['teams']) == 0)
			<h3> No Teams </h3>
		@else
			@foreach($data['teams'] as $team)
				<h3>{{{$team-> team_name}}}</h3>
				<div class="user-wrapper" style="display:inline-block">
					@foreach($data['users'] as $user)
						@if($user-> user_team == $team -> id)
							<h4>{{{$user-> first_name}}} {{{$user-> last_name}}}</h4>
						@endif
					@endforeach
				</div>
				@endforeach
		@endif
	</div>
@stop