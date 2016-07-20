<?php

namespace App;
use App\Team;
use App\Alley;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 
        'last_name',
        'user_address',
        'user_city',
        'user_state',
        'user_zip',
        'user_phone_num',
        'email',
        'password',
        'user_alley',
        'captain',
        'user_team',
        'admin'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public static function constructRecord($user, $input){

        $user->first_name = $input->get('first_name');
        $user->last_name = $input->get('last_name');
        $user->user_address = $input->get('user_address');
        $user->user_state = $input->get('user_state');
        $user->user_city = $input->get('user_city');
        $user->user_zip = $input->get('user_zip');
        $user->user_phone_num = $input->get('user_phone_num');
        $user->email = $input->get('email');
        $user->password = \Hash::make($input->get('password'));
       if($input->get('captain_status')=='captain'){
            $user->captain = 1;
            $user->user_alley = $input->get('user_alley');
            $user->save();
            $user->user_team= $user->updateTeams($input->get('user_alley'));
            $user->save();
        }
        else{
            $user->captain = 0;
            $user->user_team = 0;
            $user->user_alley = $input->get('user_alley');
            $user->save();
        }
        return $user;
    }

    public static function updateRecord($user, $input){
        $user->first_name = $input->get('first_name');
        $user->last_name = $input->get('last_name');
        $user->user_address = $input->get('user_address');
        $user->user_state = $input->get('user_state');
        $user->user_city = $input->get('user_city');
        $user->user_zip = $input->get('user_zip');
        $user->user_phone_num = $input->get('user_phone_num');
        $user->email = $input->get('email');
        if($input->get('captain_status')=='Captain'&& $user->captain==0){
            $user->captain = 1;
            $user->user_team= $user->updateTeams($user->user_alley);
        }
        else if($input->get('captain_status')=='Rover'&& $user->captain==1){
            $user->captain = 0;
            $oldTeam = $user->user_team;
            $user->user_team = 0;
            Teams::where('id',$oldTeam)->delete();
            $alley = Alley::find($user->user_alley);
            ++$alley->team_count;
        }        
        $user->save();
        return $user;
    }

    public static function createTeam($alleyId){

        $alley = Alley::find($alleyId);
        $alley->increment('team_count');
        $teamName = "Team ". $alley->team_count; 

        $newTeam = new Team();
        $newTeam->team_name = $teamName;
        $newTeam->team_size = 1;
        $newTeam->team_alley = $alleyId;
        $newTeam->save();
        return $newTeam -> id;
    }

    public function initialRules(){
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'user_address' => 'required',
            'user_city' => 'required',
            'user_state' => 'required',
            'user_zip' => 'required|size:5',
            'user_phone_num' => 'required',
            'email' => 'required|unique:users',
            'email_confirm' => 'required|same:email',
            'password' => 'required|min:6',
            'password_confirm' => 'required|min:6|same:password'
        ];
    }

    public function updateRules(){
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'user_address' => 'required',
            'user_city' => 'required',
            'user_state' => 'required',
            'user_zip' => 'required|size:5',
            'user_phone_num' => 'required',
            'email' => 'required|unique:users'
        ];
    }

    public function customMessages(){
        return [
            'required' => 'Your :attribute is required!',
            'min' => 'Your :attribute must be at least 6 characters!',
            'unique' => 'That :attribute already exists!',
            'email_confirm.same' => "Your emails don't match!",
            'password_confirm.same' => "Your passwords don't match!"
        ];
    }

    public function commonColumns(){
        return [
            'first_name'=>'First Name', 
            'last_name'=>'Last Name', 
            'user_address'=>'Address', 
            'user_city'=>'City', 
            'user_state'=>'State', 
            'user_zip'=>'Zip Code', 
            'user_phone_num'=>'Phone Number', 
            'email'=>'Email', 
            'email_confirmation'=>'Confirm Email',
            'password'=>'Password',
            'password_confirmation'=>'Confirm Password'];
    }

    public static function getTeam($teamId){
        if($teamId == 0){
            return "Roving Player";
        }
        else{
            return Team::where('id', $teamId)->value('team_name');
        }
        
    }

    public static function getAlley($alleyId){
        return Alley::where('id', $alleyId);
    }

}


