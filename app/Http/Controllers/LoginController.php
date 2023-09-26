<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view("User.login.login");
    }
    public function checklogin(Request $request){
        $data = $request->only('email', 'password');
        if(!Auth::attempt($data)){
            return redirect()->intended("/products");
        }else{
            return"something";
        }
    }
}
