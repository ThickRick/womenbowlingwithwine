@extends('layouts.main')
@section('content')
    <div class='main_title'>
        <h1>This is the about page!</h1>
        {{{var_dump($data)}}}
    </div>

@stop

@section('dynamic_title')
    About
@stop