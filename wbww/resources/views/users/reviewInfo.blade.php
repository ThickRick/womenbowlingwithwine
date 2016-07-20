@extends('layouts.main')
@section('content')

	<h2>Review your Information!</h2>
	<div class="row">
  		<div class="large-6 columns">
  			<div id = 'info_display'>
  				<p>
  					{{{$input['first_name']}}}
  					{{{$input['last_name']}}}
  				</p>
  				<p>
  					{{{$input['user_address']}}}
  					{{{$input['user_city']}}}, 
  					{{{$input['user_state']}}}  
  					{{{$input['user_zip']}}}
  				</p>
  				<p>
  					{{{$input['user_phone_num']}}}
  				</p>
  				<p>
  					{{{$input['email']}}}
  					{{{$input['alley_id']}}}
  				</p>
  				<p>
  					Player Status: 
					<?php if($input['captain_status'] == "1"):?>
			 			Team Captain 
					<?php else: ?> 
						Roving Player
					<?php endif; ?> 
  				</p>
  			</div>
  		</div>
  	</div>
  	<?php $url=route('updateInfo', $input['alley_id'])?>
  	 <a href=<?php echo $url?>>Change</a>




  	<h3>Billing Info</h3>
	{!!Form::open(array('route' => 'getRegister'))!!}
		{!!Form::label('Same as Above')!!}
		{!!Form::checkbox('same')!!}
		{!!Form::text('first_name_billing', $input['first_name'])!!}
		{!!Form::text('last_name_billing', $input['last_name'])!!}
		<p>//Rest of info//</p>
		{!!Form::label('Card Number')!!}
		{!!Form::text('card_number')!!}
		{!!Form::label('Exp Date')!!}
		{!!Form::text('exp_date')!!}
		{!!Form::label('CCV Number')!!}
		{!!Form::text('ccv_num')!!}
		{!!Form::hidden('first_name', $input['first_name'])!!}
		{!!Form::hidden('last_name', $input['last_name'])!!}
		{!!Form::hidden('user_address', $input['user_address'])!!}
		{!!Form::hidden('user_city', $input['user_city'])!!}
		{!!Form::hidden('user_state', $input['user_state'])!!}
		{!!Form::hidden('user_zip', $input['user_zip'])!!}
		{!!Form::hidden('user_phone_num', $input['user_phone_num'])!!}
		{!!Form::hidden('user_zip', $input['user_zip'])!!}
		{!!Form::hidden('user_alley', $input['alley_id'])!!}
		{!!Form::hidden('email', $input['email'])!!}
		{!!Form::hidden('email_confirmation', $input['email'])!!}
		{!!Form::hidden('password', $input['password'])!!}
		{!!Form::hidden('password_confirmation', $input['password'])!!}
		{!!Form::hidden('captain_status', $input['captain_status'])!!}
		{!!Form::submit('Submit', array('class'=>'button'))!!}
	{!!Form::close()!!}
@stop

@section('dynamic_title')
    Review Informaton
@stop