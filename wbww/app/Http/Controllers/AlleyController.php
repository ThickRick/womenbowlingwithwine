<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alley;
use App\Admin;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

class AlleyController extends Controller
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
    public function create()
    {
         return view('admin.addAlley');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'alley_name' => 'required',
            'alley_address' => 'required',
            'alley_city' => 'required',
            'alley_state' => 'required',
            'alley_zip' => 'required',
            'alley_phone' => 'required',
            'alley_price' => 'required',
            'alley_date' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
           $alley = new Alley;
           $alley-> alley_name = $request -> get('alley_name');
           $alley-> alley_address = $request -> get('alley_address'); 
           $alley-> alley_city = $request -> get('alley_city'); 
           $alley-> alley_state = $request -> get('alley_state'); 
           $alley-> alley_zip = $request -> get('alley_zip'); 
           $alley-> alley_phone = $request -> get('alley_phone'); 
           $alley-> alley_price = $request -> get('alley_price'); 
           $alley-> alley_date = $request -> get('alley_date');
           $alley->save();

           $admin = new Admin;
           $username = "alley".$alley-> id;
           $admin -> username = $username;
           $admin -> password = Hash::make($request -> get('password'));
           $admin -> user_alley = $alley -> id;
           $admin -> save();

           return redirect()->route('mainAdmin', [$alley -> id])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
       $alley_info=Alley::find($id);
       return view('alley.alleyView')->with('alley_info',$alley_info);
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
}
