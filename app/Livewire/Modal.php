<?php

namespace App\Livewire;

use Livewire\Component;

class Modal extends Component
{

    public bool $openModal = false;

    public function render()
    {
        return view('livewire.modal');
    }
}
