@extends('layouts.common')
@section('content')
    <div class="row profile-header">
	 <div class='col-xs-5 row-title'>
        <h1>Welcome, {{{$data['user']-> first_name}}}!</h1>
    </div>
    <a href="/user/edit" class="btn btn-default btn-lg" id="editButton"> <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> EDIT PROFILE</a>
    </div>
    <div class="row" id="profile">
        <div class="col-xs-6">
            <div class="row common-section">
                <div class="col-xs-2 side-accent" id="med-accent">
                    <img src="/img/LocationIcon.png">
                </div>
                <div class="col-xs-9 common-content">
                    <h4>YOUR BOWLING CENTER</h4>
                    <address>
                        {{{$data['user']->getAlley($data['user']-> user_alley)-> value('alley_name')}}}<br>
                        {{{$data['user']->getAlley($data['user']-> user_alley)-> value('alley_address')}}}<br>
                        {{{$data['user']->getAlley($data['user']-> user_alley)-> value('alley_city')}}}, {{{$data['user']->getAlley($data['user']-> user_alley)-> value('alley_state')}}} {{{$data['user']->getAlley($data['user']-> user_alley)-> value('alley_zip')}}}<br>
                    </address>
                    <address>
                        {{{$data['user']-> user_phone_num}}}
                    </address>
                </div>
            </div>
            <div class="row common-section">
                <div class="col-xs-2 side-accent" id="small-accent">
                    <img src="/img/LinkIcon.png">
                </div>
                <div class="col-xs-9 common-content">
                <h4>INVITE OTHERS TO JOIN YOUR TEAM!</h4>
                    <?php 
                    $url= "womenbowlingwithwine.com/auth/register/".$data['user']-> user_alley."/".$data['user']-> user_team;
                    $path="/auth/register/".$data['user']-> user_alley."/".$data['user']-> user_team;  
                    ?>
                    @if($data['user']-> user_team == 0)
                        <h4>You are not on a team yet!</h4>
                     @elseif($data['user']-> captain == 0 && $data['user']-> user_team != 0)
                     <h4>Only Captains have permission to share the team link!</h4>
                     @else
                    <a href=<?php echo $path?>><h4><?php echo $url ?></h4></a>
                    @endif
                </div>
            </div>
        </div>
    <div class="col-xs-6" id="teammates">
        <div class="row common-section">
                <div class="col-xs-2 side-accent" id="large-accent">
                    <img src="/img/TeamIcon.png">
                </div>
                <div class="col-xs-9 common-content">
                <h4>YOUR TEAM ROSTER</h4>
                @if($data['user']-> user_team == 0)
                    <h3>You are not on a team yet!</h3>
                @else
                    @foreach($data['teammates'] as $member)
                        <h3>{{{$member -> first_name}}} {{{$member -> last_name}}}</h3>
                        <h5>{{{$member -> email}}}</h5><br>
                    @endforeach
                @endif
                </div>
            </div>
        </div>
    </div>
    

        

@stop

@section('dynamic_title')
    About
@stop