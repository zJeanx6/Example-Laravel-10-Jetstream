<?php

namespace App\Livewire;

use Livewire\Component;

class Contador extends Component
{
    public $contador = 0;

    public function increment($cant = 1){
        $this->contador += $cant; 
    }

    public function decrement($cant = 1){
        $this->contador -= $cant;
    }

    public function render()
    {
        return view('livewire.contador');
    }
}
