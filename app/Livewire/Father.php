<?php

namespace App\Livewire;

use Livewire\Component;

class Father extends Component
{
    public $name = 'Jean Roa';

    public function render()
    {
        return view('livewire.father');
    }
}
