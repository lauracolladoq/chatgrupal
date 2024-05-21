<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class Home extends Component
{

    //Escucho el evento para actualizar la lista de posts
    #[On('eventoPostCreado')]
    public function render()
    {
        $posts = Post::select('id', 'user_id', 'imagen', 'contenido', 'created_at')
            ->orderBy('id')
            ->with('user', 'tags', 'comments')
            ->get();


        $misLikes = Post::whereHas('usersLikes', function ($q) {
            $q->where('user_id', auth()->user()->id);
        })->get();

        return view('livewire.home', compact('posts', 'misLikes'));
    }

    public function like(Post $post)
    {
        //toogle para agregar o quitar like
        $post->usersLikes()->toggle(auth()->user()->id);
    }
}
