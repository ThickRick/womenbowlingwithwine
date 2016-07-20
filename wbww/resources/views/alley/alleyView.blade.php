@extends('layouts.main')
@section('content')
	 <div class='main_title'>
        <h2>{{{$alley_info -> alley_name}}}</h2>
    </div>
    <div class="alley_info">
        <div class = "address">
            <p>
                {{{$alley_info -> alley_address}}}<br>
                {{{$alley_info -> alley_city}}}, {{{$alley_info -> alley_state}}} {{{$alley_info -> alley_zip}}}
            </p>
        </div>
    </div>
@stop

@section('dynamic_title')
    {{{$alley_info -> alley_name }}}
@stop