<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TagSites extends Component
{
    // Defino una propiedad con el nombre de la anterior variable
    public $tag;

    public $etiquetas = [];

    public function loadPosts(){
        $this->etiquetas = $this->tag;
        // Emitir evento
        $this->emit('glider');
    }

    public function render()
    {
        return view('livewire.tag-sites');
    }
}
