@extends('layouts.common')
@section('content')
	<div class="title">
		<h1>Add Alley</h1>
	</div>
	{!!Form::open(array('route' => 'insertAlley')) !!}
	<div class="row">
		<div class="col-xs-4">
			<h4>Alley Name</h4>
			<input type="text" name="alley_name" class="form-control input-lg" id="name">
		</div>
		<div class="col-xs-4">
			<h4>Address</h4>
			<input type="text" name="alley_address" class="form-control input-lg" id="address">
		</div>
		<div class="col-xs-4">
			<h4>City</h4>
			<input type="text" name="alley_city" class="form-control input-lg" id="city">
		</div>
	</div>
	<div class="row">
		<div class="col-xs-4">
			<h4>State</h4>
			<input type="text" name="alley_state" class="form-control input-lg" id="state">
		</div>
		<div class="col-xs-4">
			<h4>Zip Code</h4>
			<input type="text" name="alley_zip" class="form-control input-lg" id="zip">
		</div>
		<div class="col-xs-4">
			<h4>Phone Number</h4>
			<input type="text" name="alley_phone" class="form-control input-lg" id="phone">
		</div>
	</div>
	<div class="row">
		<div class="col-xs-4">
			<h4>Price</h4>
			<input type="text" name="alley_price" class="form-control input-lg" id="price">
		</div>
		<div class="col-xs-4">
			<h4>Event Date</h4>
			<input type="date" name="alley_date" class="form-control input-lg" id="date">
		</div>
		<div class="col-xs-4">
			<h4>Password</h4>
			<input type="text" name="password" class="form-control input-lg" id="password">
		</div>
	</div><br>

	<input type="submit" value='ADD ALLEY' class="btn btn-default btn-lg" id='submitButton'>
	{!!Form::close()!!}
@stop