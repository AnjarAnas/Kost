<?php

namespace App\Http\Livewire;

use App\Models\Pelanggan;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;

class TambahUser extends Component
{
    public $nama;
    public $email;
    public $no;
    public $univ;
    public $pass;
    public $pass_ver;

    
    public function tambah(){
        $this->validate([
            'nama'=>'required',
            'pass'=>'required',
            'pass_ver'=>'required',
            'no'=>'required',
            'univ'=>'required',
            'email'=>'required'
        ]);
        if($this->pass==$this->pass_ver){
            $user=User::create([
                'name'=> $this->nama,
                'id_bayar'=>"ID".Str::random(10),
                'email'=>$this->email,
                'no_hp'=> $this->no,
                'pass'=>bcrypt($this->pass)
            ]);
            if($user){
                $pel=Pelanggan::create([
                    'nama'=> $this->nama,
                    'univ'=>$this->univ,
                    'tgl_daftar'=>date('Y-m-d')
                ]);
                if($pel){
                    $this->hapus();
                }
            }
        }else
        {
            session()->flash('gagal','Password Yang Anda Masukan Tidak Cocok');
        }
        
    }
    public function render()
    {
        return view('livewire.tambah-user')->extends('layouts.app')->section('content');
    }
    private function hapus(){
        $this->nama='';
        $this->email='';
        $this->pass='';
        $this->no='';
        $this->univ='';
    }
}
