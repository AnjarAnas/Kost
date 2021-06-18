<?php

namespace App\Http\Livewire;

use App\Models\Bulan;
use App\Models\Keluar;
use App\Models\Pelanggan;
use App\Models\User;
use Livewire\Component;

class DashboardAdmin extends Component
{
    public $bulan;
    public $user;
    public function render()
    {
        $this->bulan=Bulan::all();
        $this->user=User::all();
        return view('livewire.dashboard-admin')->extends('layouts.app')->section('content');
        
    }
    public function dashboard(){
        
    }
    public function pindah($id){
        $pindah=User::where('id_user','=',$id)->get();
        $daftar=Pelanggan::where('id_user','=',$id)->get();
        $keluar=Keluar::create([
            'id_user'=>$pindah[0]->id_user,
            'nama'=>$pindah[0]->name,
            'email'=>$pindah[0]->email,
            'masuk'=>$daftar[0]->tgl_daftar,
            'keluar'=>date('Y/m/d')
        ]);
        
        $user=User::where('id_user','=',$id)->delete();
        if($keluar){
            if($user){
                return redirect('/dashboard')->with('sukses','Penghuni Kost Telah Keluar');
            }
        }
    }
}
