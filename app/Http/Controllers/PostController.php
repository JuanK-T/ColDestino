<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    public function show(Post $post){
        // Llamo al metodo autorize
        $this->authorize('published', $post);

        // recuperar registro
        $similares = Post::where('category_id', $post->category_id)
            ->where('status', 3)
            ->where('id', '!=', $post->id)
            ->latest('id')
            ->take(5)
            ->get();
        return view('posts.show', compact('post', 'similares'));
    }

    public function enrolled(Post $post){
        $post->visits()->attach(auth()->user()->id);
        return redirect()->route('posts.show', $post)->with('info', 'Guardado');
    }

    public function tag(Tag $tag){
        $posts = $tag->post()->where('status', 3)->latest('id')->paginate(6);
        return view('posts.tag', compact('posts', 'tag'));
    }
}
