<?php

namespace App\Livewire;

use Livewire\Component;

class Paises extends Component
{
    public $open = true;
    public $paises = [
        'Argentina',
        'Bolivia',
        'Brasil',
    ];
    public $pais;
    public $active;
    public $count = 0;

    //Funcion para agregar un pais a la lista
    public function save(){
        array_push($this->paises, $this->pais);
        // $this->pais = '';
        $this->reset('pais');
    }

    //Funcion para eliminar un pais de la lista
    public function delete($index){
        unset($this->paises[$index]);
    }

    //Funcion para cambiar el estado del pais activo, reactividad al pasar el mouse por el encima
    public function changeActive($pais){
        $this->active = $pais;
    }

    //Funcion para incrementar el contador del input, ya sean teclas o cualquier evento
    public function increment(){
        $this->count++;
    }

    //Explicacion de este metodo en la vista
    // public function resetear(){
    //     $this->count = 0;
    // }
    
    public function render()
    {
        return view('livewire.paises');
    }

}
