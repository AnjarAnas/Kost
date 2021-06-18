<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TampilTombol extends Component
{
    public $id_bayar;

    protected $listeners=[
        'pushIdBayar'=>'getIdBayar'
    ];
    public function mount(){
        dd($this->id_bayar);
    }
    public function getIdBayar($id){
        $this->id_bayar=$id;
    }
    public function render()
    {
        
        return view('livewire.tampil-tombol');
    }
}
