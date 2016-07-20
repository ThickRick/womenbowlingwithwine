<?php

namespace App\Http\Middleware;

use App\User;
use App\Team;
use App\Alley;
use Closure;
use Auth;

class CreateTeamMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if($request->get('captain_status') == 1){
            $alley = Alley::find($request->get('alley_id'));
            $alley->increment('total_teams');
            $teamName = "Team ". $alley-> total_teams; 

            $newTeam = new Team();
            $newTeam->team_name = $teamName;
            $newTeam->team_size = 1;
            $newTeam->team_alley = $alley -> id;
            $newTeam->save();
            Auth::user()-> user_team = $newTeam -> id;
        }
        else{
            Auth::user()-> user_team = 0;
        }

        return $response;
    }
}
