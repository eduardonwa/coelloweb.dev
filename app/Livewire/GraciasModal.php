<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class GraciasModal extends Component
{
    public $showModal = false;

    protected $listeners = ['openGraciasModal' => 'openModal'];

    public function openModal()
    {
        $this->showModal = true;
        $this->dispatch('open-dialog');
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        $ultimosDos = Post::latest()
            ->where('active', 1)
            ->take(5)
            ->get();

        return view('livewire.gracias-modal');
    }
}
