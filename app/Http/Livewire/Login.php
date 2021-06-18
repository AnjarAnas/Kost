<?php

namespace App\Http\Livewire;

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $pass;
    public function render()
    {
        return view('livewire.login');
    }
    public function login(){
        $userAuth=Auth::attempt(['email' => $this->email, 'password' => $this->pass]);
        if ($userAuth){
            $role=Auth::user()->role;
            if($role==1){
                return redirect()->to('/dashboard');
            }elseif($role==2){
                return redirect()->to('/home');
            }
        }
    }
    
}
