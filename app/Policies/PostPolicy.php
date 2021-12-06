<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // Los policies tienen la funcion de mostrar contenido dependiendo si se cumple que algun requerimieto que le presentemos
    public function enrolled(User $user, Post $post){
        return $post->visits->contains($user->id);
    }

    public function published(?User $user, Post $post)
    {
        if($post->status == 3){
            return true;
        }else{
            return false;
        }
    }
}
