@extends('layouts.main')
@section('content')
	 <div class='main_title'>
        <h2>Select An Alley</h2>
    </div>
    <div class="alley_list">
    	@foreach($alley_data['states'] as $state)
    		<ul class = "state_subtitle">
    			{{{$state}}}
    			@foreach($alley_data['alleys'] as $alley)
    				@if(strcmp($alley->alley_state, $state)===0)
    					<?php $url=route('userSignUp', $alley->id)?>
    					<li><a href=<?php echo $url?>> {{{$alley -> alley_name}}} : {{{$alley -> alley_city}}}, {{{$alley -> alley_state}}}</a></li>
    				@endif
    			@endforeach
    		</ul>
    	@endforeach
    </div>
@stop

@section('dynamic_title')
    Sign up
@stop