@extends('layouts.common')
@section('content')
	<div class="title">	
		<h1>Master Admin Panel</h1>
	</div>
    	<div class="button-wrapper">
    	<a href='/add-alley'><div class="btn btn-default btn-lg"> ADD ALLEY </div></a>
    	<a href='/admin/select'><div class="btn btn-default btn-lg"> EDIT AN ALLEY </div></a>
    	<a href='#'><div class="btn btn-default btn-lg"> REMOVE ALLEY </div></a>
    	</div>
@stop