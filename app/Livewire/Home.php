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
        $posts = Post::select('post.id as id_post', 'user_id', 'imagen', 'contenido')
            ->join('tags', 'tags.id', '=', 'tag_id');

        $tags = Tag::select('id', 'nombre', 'color')->orderBy('nombre')->get();

        $users = User::select('id', 'name', 'email', 'avatar');

        $misLikes = Post::whereHas('usersLikes', function ($q) {
            $q->where('user_id', auth()->user()->id);
        })->get();
        return view('livewire.home', compact('posts', 'tags', 'misLikes', 'users'));
    }
}
