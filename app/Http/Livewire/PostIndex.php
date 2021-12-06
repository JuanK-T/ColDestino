<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;
    public $category_id;
    public $tag_id;
    public function render()
    {

        $categories = Category::all();
        $tags = Tag::all()->take(8);
        $posts = Post::where('status', 3)
            ->category($this->category_id)
            ->latest('id')
            ->paginate(8);
        return view('livewire.post-index', compact('posts', 'categories', 'tags'));
    }

    public function resetFilters()
    {
        $this->reset(['category_id']);
    }
}
