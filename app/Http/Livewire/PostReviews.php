<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Review;
use Jenssegers\Date\Date;
use Livewire\Component;

class PostReviews extends Component
{
    public $post_id, $comment, $publicacion, $review;
    public $rating = 5;


    protected $rules= [
        'publicacion.comment' => 'required',
        'publicacion.rating' => 'required'
    ];

    public function mount(Post $post){
        $this->post_id = $post->id;
        $this->review = $post;
        $this->publicacion = new Post();
    }

    // Agregar un mutador
    /* public function getCreateAtAttribute($date){
        return new Date($date);
    } */

    public function render()
    {
        $post = Post::find($this->post_id);
        // $reviews = Post::where('user_id', auth()->user()->id);

        return view('livewire.post-reviews', compact('post'));
    }

    public function store(){
        $post = Post::find($this->post_id);
        $post->reviews()->create([
            'comment' => $this->comment,
            'rating' => $this->rating,
            'user_id' => auth()->user()->id
        ]);
        $this->reset('comment');
    }

    public function edit(Review $review){
        $this->publicacion = $review;
        $this->rating = $review->rating;
    }

    public function resetear(){
        $this->reset('comment');
    }

    public function update(){
        $this->validate();
        $this->publicacion->save();
        $this->publicacion = new Post();

        $this->review = Post::find($this->review->id);
    }

    public function destroy(Review $review){
        $review->delete();
        $this->publicacion = Post::find($this->review->id);
    }
}
