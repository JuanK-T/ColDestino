<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Search extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.search');
    }

    // Propiedad computada
    public function getResultsProperty(){
        return Post::where('name', 'LIKE', '%'.$this->search.'%')->where('status', 3)->take(5)->get();
    }
}
