<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class CreatePost extends Component
{
    /*Nos permite almacenar:
    Datos primitivos (Array, String, Integer, Float, Boolean, Null, Colleciones)
    los almacena tal cual los definamos.

    Mientras que estos tipos, los va a deshidratar osea convertir en json 
    e hidratar osea convertir obejtos de php
    lo que hace posible que la propiedad no conserve los valores en tiempo 
    de ejecucion  Colleciones, modelos, datetime, etc
    */

    public $title, $name, $email;

    public function mount(User $user){

        // $this->name = $user->name;
        // $this->email = $user->email;

        $this->fill(
            $user->only(['name', 'email'])
        );

    }

    public function save(){
        // dd($this->name);
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
