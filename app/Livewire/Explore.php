<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Livewire\Component;

class Explore extends Component
{
    public function render()
    {
        $posts = Post::select('id', 'user_id', 'imagen', 'contenido', 'created_at')
            ->orderBy('id')
            ->with('user')
            ->get();

        $tags = Tag::select('id', 'nombre', 'color')->orderBy('nombre')->get();

        $users = User::select('id', 'name', 'email', 'avatar')->get();

        return view('livewire.explore', compact('posts', 'tags', 'users'));
    }
}
