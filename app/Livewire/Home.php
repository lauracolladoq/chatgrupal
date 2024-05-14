<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $posts = Post::select('id', 'user_id', 'imagen', 'contenido', 'created_at')
            ->orderBy('id')
            ->with('user', 'tags', 'comments')
            ->take(5)
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
