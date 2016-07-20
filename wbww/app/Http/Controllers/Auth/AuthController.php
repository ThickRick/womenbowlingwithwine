<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Alley;
use App\Team;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
   /*
   |--------------------------------------------------------------------------
   | Registration & Login Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles the registration of new users, as well as the
   | authentication of existing users. By default, this controller uses
   | a simple trait to add these behaviors. Why don't you explore it?
   |
   */

   use AuthenticatesAndRegistersUsers, ThrottlesLogins;

   //private $redirectRegisterTo = '/auth/review';

   private $redirectTo = '/user/profile';

  
   /**
    * Create a new authentication controller instance.
    *
    * @return void
    */
   public function __construct()
   {
       $this->middleware('guest', ['except' => 'getLogout']);
   }

   /**
    * Get a validator for an incoming registration request.
    *
    * @param  array  $data
    * @return \Illuminate\Contracts\Validation\Validator
    */
   protected function validator(array $data)
   {
       return Validator::make($data, [
           'first_name' => 'required',
            'last_name' => 'required',
            'user_address' => 'required',
            'user_city' => 'required',
            'user_state' => 'required',
            'user_zip' => 'required|size:5',
            'user_phone_num' => 'required',
            'email' => 'required|confirmed|unique:users',
            'password' => 'required|confirmed|min:6',
            'captain_status' => 'required'
       ]);
   }

   /**
    * Create a new user instance after a valid registration.
    *
    * @param  array  $data
    * @return User
    */
   protected function create(array $data)
   {
      if($data['user_team']!=0){
        $teamId = $data['user_team'];
      }
      else{
         $teamId = $this->createTeam($data['alley_id'], $data['captain_status']);
      }
     
       return User::create([
           'first_name' => $data['first_name'],
           'last_name' => $data['last_name'],
           'user_address' => $data['user_address'],
           'user_city' => $data['user_city'],
           'user_state' => $data['user_state'],
           'user_zip' => $data['user_zip'],
           'user_phone_num' => $data['user_phone_num'],
           'email' => $data['email'],
           'password' => bcrypt($data['password']),
           'captain' => $data['captain_status'],
           'user_alley' => $data['alley_id'],
           'user_team' => $teamId
       ]);
   }

   public function createTeam($alleyId, $captain){

        $alley = Alley::find($alleyId);
        $alley->increment('total_teams');
        $teamName = "Team ". $alley->total_teams; 
        if($captain == '1'){
          $newTeam = new Team();
          $newTeam->team_name = $teamName;
          $newTeam->team_size = 1;
          $newTeam->team_alley = $alleyId;
          $newTeam->save();
          return $newTeam -> id;
        }
        else{
          return 0;
        }
    }

   protected function getRegister($id, $teamId){
        $alley=Alley::find($id);
        $blankUser= new User();
        $commonNames=$blankUser->commonColumns();
        $data=array('alley'=>$alley, 'labels'=>$commonNames, 'team'=> $teamId);
        return view('auth.register')->with('data', $data);
        }
   }
