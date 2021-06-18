<?php

namespace App\Http\Livewire;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DashboardUser extends Component
{
    public $bayar;
    public $con=true;
    public $token;
    
    
    public function render()
    {
        $id_user=Auth::user()->id_user;
        $this->bayar=DB::table('pembayaran')
        ->join('bulan','pembayaran.id_bulan','=','bulan.id_bulan')
        ->where('pembayaran.id_user','=',$id_user)
        ->get();
        
        
        return view('livewire.dashboard-user')->extends('layouts.app')->section('content');
    }
    
}
