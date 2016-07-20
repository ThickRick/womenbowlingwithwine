@extends('layouts.main')
@section('content')
	<h2>Sign Up</h2>
	<h3>
		@foreach($data->getAlley($data->user_alley) as $info)
			{{{$info}}}
		@endforeach
	</h3>
        {!!Form::open(array('route' => 'reviewInfo'))!!}
        	{!!Form::hidden('alley_id', $data->user_alley)!!}
        	@foreach($data['labels'] as $column => $label)        			
        		{!! Form::label($column, $label) !!}
				{!! Form::text($column) !!}
				{!! $errors->first($column, '<small class="error">:message</small>') !!}
        	@endforeach
				<div class="row">
					<div class="large-6 columns">
      					<label>Create a team or just join the league?</label>
      					<input type="radio" name="captain_status" value="Captain" id="captain_status"><label for="captain_status">Create team</label>
      					<input type="radio" name="captain_status" value="Rover" id="rover_status"><label for="rover_status">Just Join</label>
    				</div>
    				<div class="large-6 columns end"></div>
    			</div>
				{!!Form::submit('submit', array('class'=>'button'))!!}
		{!!Form::close()!!}

@stop

@section('dynamic_title')
    User Sign Up
@stop