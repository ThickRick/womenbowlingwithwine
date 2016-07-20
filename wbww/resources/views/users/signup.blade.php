@extends('layouts.main')
@section('content')
	<h2>Sign Up</h2>
	<h3>
		@foreach($data['alley']->getAttributes() as $info)
			{{{$info}}}
		@endforeach
	</h3>
        {!!Form::open(array('route' => 'reviewInfo'))!!}
        	{!!Form::hidden('alley_id', $data['alley']->id)!!}
        	@foreach($data['labels'] as $column => $label)        			
        		{!! Form::label($column, $label) !!}
        		@if($column == 'password' || $column == 'password_confirmation')
        			{!! Form::password($column) !!}
        		@else
					{!! Form::text($column) !!}
				@endif
				{!! $errors->first($column, '<small class="error">:message</small>') !!}
        	@endforeach
				<div class="row">
					<div class="large-6 columns">
      					<label>Create a team or just join the league?</label>
      					<input type="radio" name="captain_status" value="1"><label>Create team</label>
      					<input type="radio" name="captain_status" value="0"><label>Just Join</label>
    				</div>
    				<div class="large-6 columns end"></div>
    			</div>
				{!!Form::submit('submit', array('class'=>'button'))!!}
		{!!Form::close()!!}

@stop

@section('dynamic_title')
    User Sign Up
@stop