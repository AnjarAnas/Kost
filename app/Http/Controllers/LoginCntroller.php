<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginCntroller extends Controller
{
    public function index(){
        return view('login');
    }
    public function login(Request $req){
        $userAuth=Auth::attempt(['email' => $req->email, 'password' => $req->password]);
        if ($userAuth){
            $role=Auth::user()->role;
            if($role==1){
                return view('dashboard');
            }
        }
    }
    public function logout(){
        Auth::logout();
        
            return redirect('/');
        
    }
}
