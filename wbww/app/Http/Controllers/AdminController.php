<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Alley;
use App\User;
use App\Team;
use App\Admin;

class AdminController extends Controller
{
     /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getLogin()
    {
        return view("admin.login");
    }

    public function showMain(){
        return view('admin.masterAdmin');
    }

    public function masterSelect()
    {
        $alley_list=Alley::all();
        $state_list=array();
        foreach($alley_list as $alley){
            if(!in_array($alley->alley_state, $state_list)){
                array_push($state_list, $alley->alley_state);    
            }
        }
        sort($state_list);
        $data = array('alleys'=>$alley_list, 'states'=> $state_list);
        return view("admin.masterSelect")->with('alley_data', $data);
    }

    public function getAdmin($id){
        $alley=Alley::find($id);
        $admin=Admin::where('user_alley', $id)->first();
        $teamList=Team::where('team_alley', $id)->get();
        $userList=User::where('user_alley', $id)->get();
        $data=array('alley'=>$alley, 'teams'=>$teamList, 'users'=>$userList, 'admin'=>$admin);
        return view('admin.mainAdmin')->with('data', $data);
    }

    public function updateAlley($id, Request $request){
        $alley = Alley::find($id);
        $updateInfo = $request->all();
        foreach($updateInfo as $label => $value){
            if($label == '_token'){
                continue;
            }
            $alley -> $label = $value;
        }
        $alley->save();
        $admin=Admin::where('user_alley', $id)->first();
        $teamList=Team::where('team_alley', $id)->get();
        $userList=User::where('user_alley', $id)->get();
        $data=array('alley'=>$alley, 'teams'=>$teamList, 'users'=>$userList, 'admin'=>$admin);
        return view('admin.mainAdmin')->with('data', $data);
    }

}
