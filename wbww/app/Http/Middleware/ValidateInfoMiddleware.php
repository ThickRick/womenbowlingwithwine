<?php

namespace App\Http\Middleware;

use Closure;
use Validator;

class ValidateInfoMiddleware
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
           'first_name' => 'required',
            'last_name' => 'required',
            'user_address' => 'required',
            'user_city' => 'required',
            'user_state' => 'required',
            'user_zip' => 'required|size:5',
            'user_phone_num' => 'required',
            'email' => 'required|confirmed|unique:users',
            'password' => 'required|confirmed|min:6'
       ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            return $next($request);
        }
        
    }
}
