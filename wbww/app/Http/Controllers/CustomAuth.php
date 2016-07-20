<?php
namespace App\Http\Controllers;  
  
use Auth;  
use Request;  
  
class CustomAuth extends Controller {  
  
    public function getLogin() {  
        return view('auth.login');  
    }

  
    public function postLogin() {  
        $email = Request::input('email');  
        $password = Request::input('password');  
              
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            return 
        }  
    }
}  