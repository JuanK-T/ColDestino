<?php

namespace App\Observers;

use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class TagObserver
{
    /**
     * Handle the Tag "created" event.
     *
     * @param  \App\Models\Tag  $tag
     * @return void
     */
    
    // El evento se ejecuta antes de eliminar el post
    public function deleting(Tag $tag)
    {
        // Busco si el post tiene una imagen asociada
        if($tag->image){
            Storage::delete($tag->image->url);
        }
    }
}
