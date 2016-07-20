<?php

namespace App\Http\Middleware;

use Closure;
use App\Admin;
use Hash;
use Validator;

class AdminMiddleware
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
        $validator = Validator::make($request->all(), [
           'username' => 'required',
            'password' => 'required'
       ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            if($request->get('username') == 'master'){
                if (Hash::check($request->get('password'), Admin::where('username', 'master')->value('password'))){
                    return redirect('admin/main');
                }

                else{
                    return redirect()->back()
                            ->with('badPassword', 'Your password was incorrect!');
                }
            }

            else{
                $admin = Admin::where('username', $request->get('username'))->first();
                if ($admin == null) {
                    return redirect()->back()
                            ->with('badUsername', 'Your username was incorrect!');
                }
                else{
                    if(Hash::check($request->get('password'), $admin-> password)){
                       return redirect()->route('mainAdmin', [ $admin -> user_alley ]); 
                    }
                    else{
                       return redirect()->back()
                            ->with('badPassword', 'Your password was incorrect!'); 
                    }
                }
            }
                
        }
        return $next($request);
    }
}
        
