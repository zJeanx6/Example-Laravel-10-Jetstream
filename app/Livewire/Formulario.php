<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;

class Formulario extends Component
{

    public $categories, $tags;
    public $category_id = '', $title, $content;
    public $selectedTags = [];
    public $posts;
    public $openUpdate = false;
    public $postEdit = [
        'category_id' => '',
        'title' => '',
        'content' => '',
        'tags' => [],
    ];

    public function mount()
    {
        $this->categories = Category::all();
        $this->tags = Tag::all();

        $this->posts = Post::all();
    }

    public function save()
    {
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

        $post = Post::create(
            $this->only('category_id', 'title', 'content')
        );

        $post->tags()->attach($this->selectedTags);
        $this->reset(['category_id', 'title', 'content', 'selectedTags']);
        $this->posts = Post::all();

    }

    public function edit($postId)
    {
        $this->openUpdate = true;

        $post = Post::find($postId);

        $this->postEdit['category_id'] = $post->category_id;
        $this->postEdit['title'] = $post->title;
        $this->postEdit['content'] = $post->content;
        $this->postEdit['tags'] = $post->tags->pluck('id')->toArray();
        
    }

    public function render()
    {
        return view('livewire.formulario');
    }
}
