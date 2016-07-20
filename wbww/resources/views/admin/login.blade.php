@extends('layouts.common')
@section('content')
    <div class='title'>
        <h1>Admin Log In</h1>
    </div>

    {!!Form::open(array('class' => 'form inline'))!!}
    	<div class="row">
				<div class="col-xs-5">
					<div class="form-group">
    					<label for="username">USERNAME</label>
    					<input type="username" name="username"class="form-control input-lg" id="email">
    					@if (session('badUsername'))
                            <div class="alert alert-danger" role="alert">
                            {{ session('badUsername') }}
                            </div>
                        @endif
  					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-5">
					<div class="form-group">
    					<label for="password">PASSWORD</label>
    					<input type="password" name="password"class="form-control input-lg" id="password">
    					@if (session('badPassword'))
                            <div class="alert alert-danger" role="alert">
                            {{ session('badPassword') }}
                            </div>
                        @endif
  					</div>
				</div>
			</div> 
    	{!!Form::submit('Login', array('class'=>"btn btn-default btn-lg"))!!}
    	</div>
    {!!Form::close()!!}

@stop

@section('dynamic_title')
    Admin Log In
@stop