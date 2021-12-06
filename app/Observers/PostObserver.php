<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function creating(Post $post)
    {
        if(! \App::runningInConsole()){
            $post->user_id = auth()->user()->id;
        }
    }

    // El evento se ejecuta antes de eliminar el post
    public function deleting(Post $post)
    {
        // Busco si el post tiene una imagen asociada
        if($post->image){
            Storage::delete($post->image->url);
        }
    }
}
