<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Search;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;
    public $search;
    public function render()
    {
        
        $posts = Post::where('name', 'LIKE', '%'.$this->search.'%')
            ->where('user_id', auth()->user()->id)
            ->latest('id')
            ->paginate(8);
        return view('livewire.admin.post-index', compact('posts'));
    }

    public function limpiar_page()
    {
        $this->resetPage();
    }
}
