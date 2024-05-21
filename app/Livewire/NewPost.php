<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewPost extends Component
{
    use WithFileUploads;

    #[Validate(['required', 'image', 'max:1024'])]
    public $imagen;

    #[Validate('nullable', 'string', 'max:255')]
    public string $contenido="";

    #[Validate('nullable', 'array', 'exists:tags,id')]
    public array $tags = [];

    public bool $openModalCrear = false;

    public function store()
    {

      $this->validate();
        // dd($this->imagen);
        $post = Post::create([
            'imagen' => $this->imagen->store('posts'),
            'contenido' => $this->contenido,
            'user_id' => auth()->id(),
        ]);

        //Añado tags
        $post->tags()->attach($this->tags);

        $this->dispatch('eventoPostCreado')->to(Home::class);

        //Mensaje de info
        $this->dispatch("mensaje", "Post creado correctamente");
        $this->cancelarCrear();
    }

    public function cancelarCrear()
    {
        $this->reset(['openModalCrear', 'imagen', 'contenido', 'tags']);
    }

    public function render()
    {
        $misTags = Tag::all();
        return view('livewire.new-post', compact('misTags'));
    }

}
