@extends('layouts.common')
@section('content')
    <div class='title'>
        <h1>Log In</h1>
    </div>

    {!!Form::open(array('class' => 'form inline'))!!}
    	<div class="row">
				<div class="col-xs-5">
					<div class="form-group">
    					<label for="email">EMAIL</label>
    					<input type="email" name="email"class="form-control input-lg" id="email">
    					{!! $errors->first('email', '<small class="error">:message</small>') !!}
  					</div>
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
			</div> 
    	{!!Form::submit('Login', array('class'=>"btn btn-default btn-lg"))!!}
    	</div>
    {!!Form::close()!!}

@stop

@section('dynamic_title')
    Log In
@stop