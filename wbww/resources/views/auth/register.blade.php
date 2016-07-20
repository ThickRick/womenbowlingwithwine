@extends('layouts.common')
@section('content')
	<div class="title">	
		<h1>Here's the info for your local league:</h1>
	</div>
	<div class="row common-section">
		<div class="col-xs-1 side-accent">
			<img src="/img/LocationIcon.png">
		</div>
		<div class="col-xs-4 common-content">
			<h4>BOWLING CENTER</h4>
			<address>
  				{{{$data['alley']->alley_name}}}<br>
  				{{{$data['alley']->alley_address}}}<br>
  				{{{$data['alley']->alley_city}}}, {{{$data['alley']->alley_state}}} {{{$data['alley']->alley_zip}}}<br>
			</address>
		</div>
		<div class="col-xs-3 common-content">
			<h4>PRICE</h4>
			<p> ${{{$data['alley']->alley_price}}}</p>
		</div>
		<div class="col-xs-3 common-content">
			<h4>LEAGUE DATE</h4>
			<p>{{{$data['alley']->alley_date}}}</p>
		</div>
	</div>

	<div class="title middle-title">	
		<h1>Ready to get started?</h1>
		<h4>Fill out the form below.</h4>
	</div>
	{!!Form::open(array('route' => 'postAuth', 'class' => 'form inline', "method" => 'post'))!!}
		@if($data['team']!=0)
			<?php $display = "display:none"; ?>
		@else
			<?php $display = ""; ?>
		@endif
		{!!Form::hidden('user_team', $data['team'])!!}
	<div class="row common-section" style="<?= $display?>" >
		<div class="col-xs-1 side-accent">
			<img src="/img/TeamIcon.png">
		</div>
	<div class="form group">
	<div class="col-xs-5" id="r1">
		<h5>CHOOSE ONE:</h5>
  		<input type="radio" id="captain" name="captain_status" value= '1'/>
  		<label for="captain"><span></span>I want to start my own team</label>
  	</div>
	<div class="col-xs-5" id="r2">
 		<input type="radio" id="rover" name="captain_status" value= '0' checked/>
 		<label for="rover"><span></span>I just want to join the league</label>
		</div>
	</div>
	</div>
	<div class="row common-section">
		<div class="col-xs-1 side-accent" id="info-accent">
			<img src="/img/Info.png">
		</div>
		<div class="col-xs-10">
			<div class="row">
				<div class="col-md-4 form-top">
					<div class="form-group">
    					<label for="firstName">FIRST NAME</label>
    					<input type="text" name="first_name"class="form-control input-lg" id="firstName">
    					{!! $errors->first('first_name', '<small class="error">:message</small>') !!}
  					</div>
				</div>
				<div class="col-md-4 form-top">
					<div class="form-group">
    					<label for="lastName">LAST NAME</label>
    					<input type="text" name="last_name"class="form-control input-lg" id="lastName">
    					{!! $errors->first('last_name', '<small class="error">:message</small>') !!}
  					</div>
				</div>
				<div class="col-md-4 form-top">
					<div class="form-group">
    					<label for="address">ADDRESS</label>
    					<input type="text" name="user_address"class="form-control input-lg" id="address">
    					{!! $errors->first('user_address', '<small class="error">:message</small>') !!}
  					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-xs-4">
					<div class="form-group">
    					<label for="city">CITY</label>
    					<input type="text" name="user_city"class="form-control input-lg" id="city">
    					{!! $errors->first('user_city', '<small class="error">:message</small>') !!}
  					</div>
				</div>
				<div class="col-xs-2">
					<div class="form-group">
    					<label for="state">STATE</label>
    					<input type="text" name="user_state"class="form-control input-lg" id="state" placeholder="XX" maxlength="2">
    					{!! $errors->first('user_state', '<small class="error">:message</small>') !!}
  					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
    					<label for="zip">ZIP CODE</label>
    					<input type="text" name="user_zip"class="form-control input-lg" id="zip" placeholder="XXXXX" maxlength="5">
    					{!! $errors->first('user_zip', '<small class="error">:message</small>') !!}
  					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
    					<label for="phoneNum">PHONE NUMBER</label>
    					<input type="text" name="user_phone_num" class="form-control input-lg" id="phoneNum" placeholder="XXX-XXX-XXXX" maxlength="12">
    					{!! $errors->first('user_phone_num', '<small class="error">:message</small>') !!}
  					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-5">
					<div class="form-group">
    					<label for="email">EMAIL</label>
    					<input type="email" name="email"class="form-control input-lg" id="email">
    					{!! $errors->first('email', '<small class="error">:message</small>') !!}
  					</div>
				</div>
				<div class="col-xs-5">
					<div class="form-group">
    					<label for="emailConfirm">CONFIRM EMAIL</label>
    					<input type="email" name="email_confirmation"class="form-control input-lg" id="emailConfirm">
    					{!! $errors->first('email_confirmation', '<small class="error">:message</small>') !!}
    				</div>
				</div>
				<div class="col-xs-2" id="emailValid">
					<img src="/img/Valid.png">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-5">
					<div class="form-group">
    					<label for="password">PASSWORD</label>
    					<input type="password" name="password"class="form-control input-lg" id="password">
    					{!! $errors->first('password', '<small class="error">:message</small>') !!}
  					</div>
				</div>
				<div class="col-xs-5">
					<div class="form-group">
    					<label for="passwordConfirm">CONFIRM PASSWORD</label>
    					<input type="password" name="password_confirmation"class="form-control input-lg" id="passwordConfirm">
    					{!! $errors->first('password_confirmation', '<small class="error">:message</small>') !!}
    				</div>
			</div>
			<div class="col-xs-2" id="passwordValid">
				<img src="/img/Valid.png">
			</div>
		</div>
	</div>
	</div>

	<div class="title">	
		<h1>Please enter your billing information:</h1>
	</div>

	<div class="row common-section">
		<div class="col-xs-1 side-accent" id='payment'>
			<img src="/img/Payment.png">
		</div>
		<div class="col-xs-10 common-content">
			<div class="row">
				<div id = 'same-toggle'>
  					<input type="checkbox" id="sameInfo" name="same" checked/>
  					<label for="sameInfo"><span></span>Same as above</label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 form-top">
					<div class="form-group">
    					<label for="firstName">FIRST NAME</label>
    					<input type="text" name="first_name_billing"class="form-control input-lg" id="firstName">
  					</div>
				</div>
				<div class="col-md-4 form-top">
					<div class="form-group">
    					<label for="lastName">LAST NAME</label>
    					<input type="text" name="last_name_billing"class="form-control input-lg" id="lastName">
  					</div>
				</div>
				<div class="col-md-4 form-top">
					<div class="form-group">
    					<label for="address">ADDRESS</label>
    					<input type="text" name="user_address_billing"class="form-control input-lg" id="address">
  					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
    					<label for="city">CITY</label>
    					<input type="text" name="user_city_billing"class="form-control input-lg" id="city">
    					
  					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
    					<label for="state">STATE</label>
    					<input type="text" name="user_state_billing"class="form-control input-lg" id="state" placeholder="XX" maxlength="2">
  					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
    					<label for="zip">ZIP CODE</label>
    					<input type="text" name="user_zip_billing"class="form-control input-lg" id="zip" placeholder="XXXXX" maxlength="5">
  					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					<div class="form-group">
					<label for="CC-num">CREDIT CARD NUMBER</label>
    					<input type="text" name="cc_number"class="form-control input-lg" id="CC-num">
    				</div>
				</div>
				<div class="col-md-2 col-xs-6">
					<div class="form-group">
					<label for="expDate">EXP DATE</label>
    					<input type="text" class="form-control input-lg" pattern="\d{1,2}/\d{1,2}" name="exp-date" placeholder="MM/YY"  id="expDate" maxlength="5" />
    				</div>
				</div> 
				<div class="col-md-2 col-xs-6">
					<div class="form-group">
					<label for="cvv">CVV</label>
    					<input type="text" class="form-control input-lg" name="cvv_num" placeholder="XXX"  id="cvv" maxlength="3" />
    				</div>
				</div>
		</div>
	</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-xs-offset-4" id="sumbit-btn">
			{!!Form::hidden('alley_id', $data['alley']->id)!!}
			<input type="submit" value='CONFIRM AND PAY' class="btn btn-default btn-lg" id='submitButton'>
		</div>
	</div>
	{!!Form::close()!!}


@stop