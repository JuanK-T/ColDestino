<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PostLatest extends Component
{
    // Defino una propiedad con el nombre de la anterior variable
    public $post;

    public function render()
    {
        return view('livewire.post-latest');
    }
}
