<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public bool $openModal = false;
    public function openModal()
    {
        $this->emit('openModal');
    }

    public function render()
    {
        return view('livewire.modal');
    }
}
