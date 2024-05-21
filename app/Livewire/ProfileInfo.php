<?php

namespace App\Livewire;

use Livewire\Component;

class ProfileInfo extends Component
{
    public bool $openModalPerfil = false;

    public function render()
    {
        $user = auth()->user();
        return view('livewire.profile-info', compact('user'));
    }

    public function cancelarPerfil()
    {
        $this->reset(['openModalPerfil']);
    }
}
