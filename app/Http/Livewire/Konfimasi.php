<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Konfimasi extends Component
{
    public function render()
    {
        return view('livewire.konfimasi')->extends('layouts.app')->section('content');
    }
}
