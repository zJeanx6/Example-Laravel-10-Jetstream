<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ComputedComponent extends Component
{
    public $post_id;


    // Al usar la propiedad computada la consulta se hace una vez y se puede repetir en el front las veces que queramos.
    // Si utilzamos directamente el metodo lo que haremos sera repetir y repetir la contultar, generar trafico innsecesario.
    #[Computed()]
    public function post(){
        return Post::find($this->post_id);
    }

    public function render(){
        return view('livewire.computed-component');
    }
}
