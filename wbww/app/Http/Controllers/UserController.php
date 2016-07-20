<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Alley;
use App\Team;
use App\Http\Requests\CreateUserRequest;
use App\Http\Controllers\Controller;
use Validator;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id)
    {
        $alley=Alley::find($id);
        $blankUser= new User();
        $commonNames=$blankUser->commonColumns();
        $data=array('alley'=>$alley, 'labels'=>$commonNames);
        return view('pages.signup')->with('data', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store()
    {
        $test = $request->all();
        return view('users.profile')->with('data', $test);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function authenticate(Request $request){
        $blankUser = new User();
        $user = User::constructRecord($blankUser, $request);
        $teamList = User::where('user_team', $user-> user_team)->get();
        $data = array('user' => $user, 'teammates' => $teamList);
        return view('users.profile')->with('data', $data);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAlleys(){
        $alley_list=Alley::all();
        $state_list=array();
        foreach($alley_list as $alley){
            if(!in_array($alley->alley_state, $state_list)){
                array_push($state_list, $alley->alley_state);    
            }
        }
        sort($state_list);
        $data = array('alleys'=>$alley_list, 'states'=> $state_list);
        return view('pages.alleySelect')->with('alley_data', $data);
    }

    public function review(CreateUserRequest $request){

        return view('auth.register')->with('input', $request->all());

    }

    public function getProfile(Request $request){
        $user = $request->user();
        $teamList = User::where('user_team', $user-> user_team)->get();
        $data = array('user' => $user, 'teammates' => $teamList);
        return view('users.profile')->with('data', $data);
    }
}