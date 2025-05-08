<?php

namespace App\Livewire;

use App\Livewire\Forms\PostCreateForm;
use App\Livewire\Forms\PostEditForm;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Formulario extends Component
{

    //Colecciones a cargar en el metodo mount() para datos de entrada:
    //en este caso la lista de posts, etiquetas y categorias.
    public $posts, $categories, $tags;

    //Instaciamos las clases Create y Update para los formularios, clases que contienen:
    //Porpuedades, metodos y validaciones para estos formularios.
    public PostCreateForm $postCreate;
    public PostEditForm $postEdit;

    // #[Rule('required')]
    // public $title;

    // #[Rule('required')]
    // public $content;

    // #[Rule('required')]
    // public $category_id = '';

    // #[Rule('required')]
    // public $selectedTags = [];

    // #[Rule([
    //     'postCreate.title' => 'required',
    //     'postCreate.content' => 'required',
    //     'postCreate.category_id' => 'required|exists:categories,id',
    //     'postCreate.tags' => 'required|array',
    // ], [
    //     'postCreate.category_id.required' => 'Debes seleccionar una categoria.'
    // ], [
    //     'postCreate.category_id' => 'categoria'
    // ])]

    // public $openUpdate = false;
    // public $postEditId = '';
    // public $postEdit = [
    //     'category_id' => '',
    //     'title' => '',
    //     'content' => '',
    //     'tags' => [],
    // ];

    //Ciclo de vida de un componente, Mount es cuando montamos el componente
    //Cargamos datos iniciales como listas, colecciones, etc.
    public function mount()
    {
        $this->categories = Category::all();
        $this->tags = Tag::all();
        
        $this->posts = Post::all();
    }


    public function updating($property, $value){
    //Metodo que nos permite interceptar en el ciclo de vida, antes de realizar algun cambio podemos 
    //realizar acciones como mutar la informacion, o validar algo más como opciones no disponles, para evitar usuarios mal intencionados
        // dd($property, $value);
        if ($property == 'postCreate.category_id') {
            if ($value > 3) {
                throw new \Exception("No puedes seleccionar esta categoria");
            }
        }
    }

    public function updated($property, $value) {
        //Este metodo es para realizar algo similar al anterior con la diferencia de que aqui 
        //interceptamos despues de que livewire realice los cambios.
    }

    public function hydrate(){

    }

    public function deshydrate(){
        
    }

    public function save()
    {
        $this->postCreate->validate();
        $this->postCreate->save();
        $this->posts = Post::all();
        $this->dispatch('post-created', 'Nuevo articulo creado');

        // $this->validate([
        //     'title' => 'required',
        //     'content' => 'required',
        //     'category_id' => 'required|exists:categories,id',
        //     'selectedTags' => 'required|array'
        // ], [
        //     'title.required' => 'El campo titulo es requerido.'
        // ], [
        //     'category_id' => 'categoria'
        // ]);

        // dd([
        //     'category_id' => $this->category_id,
        //     'title' => $this->title,
        //     'content' => $this->content,
        //     'selectedTags' => $this->selectedTags,
        // ]);

        // $post = Post::create([
        //     'category_id' => $this->category_id,
        //     'title' => $this->title,
        //     'content' => $this->content,
        // ]);

        // $post = Post::create(
            // [
            //     'title' => $this->postCreate['title'],
            //     'content' => $this->postCreate['content'],
            //     'category_id' => $this->postCreate['category_id'],
            // ]
            // $this->postCreate->only('category_id', 'title', 'content')
            
        // );

        // $post->tags()->attach($this->postCreate['tags']);
        // $post->tags()->attach($this->postCreate->tags);

        // $this->reset(['postCreate']);
        // $this->postCreate->reset();

    }

    public function edit($postId)
    {
        $this->resetValidation();
        $this->postEdit->edit($postId);
        // $this->openUpdate = true;
        // $this->postEditId = $postId;
        // $post = Post::find($postId);

        // $this->postEdit['category_id'] = $post->category_id;
        // $this->postEdit['title'] = $post->title;
        // $this->postEdit['content'] = $post->content;
        // $this->postEdit['tags'] = $post->tags->pluck('id')->toArray();
        
    }

    public function update()
    {
        $this->postEdit->update();
        $this->posts = Post::all();
        $this->dispatch('post-created', 'Articulo actualizado');

        // $this->validate([
        //     'postEdit.title' => 'required',
        //     'postEdit.content' => 'required',
        //     'postEdit.category_id' => 'required|exists:categories,id',
        //     'postEdit.tags' => 'required|array'
        // ], [
        //     'postEdit.title.required' => 'El campo titulo es requerido.'
        // ], [
        //     'postEdit.category_id' => 'categoria'
        // ]);

        // $post = Post::find($this->postEditId); 

        // $post->update([
        //     'category_id' => $this->postEdit['category_id'],
        //     'title' => $this->postEdit['title'],
        //     'content' => $this->postEdit['content']
        // ]);

        // $post->tags()->sync($this->postEdit['tags']);

        // $this->reset(['postEditId', 'postEdit', 'openUpdate']);
        
    }

    public function destroy($postId) 
    {
        $post = Post::find($postId);

        $post->delete();

        $this->posts = Post::all();

        $this->dispatch('post-created', 'Articulo eliminado');
    }

    public function render()
    {
        return view('livewire.formulario');
    }
}
