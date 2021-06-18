<?php

namespace App\Http\Livewire;

use App\Models\Keluar;
use Livewire\Component;

class UserKeluarAdmin extends Component
{
    public $keluar;
    public function render()
    {
        $this->keluar=Keluar::all();
        
        return view('livewire.user-keluar-admin')->extends('layouts.app')->section('content');;
    }
}
