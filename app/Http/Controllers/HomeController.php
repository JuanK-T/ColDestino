<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        // Recuperar todos los post
        $posts = Post::where('status', '3')->latest('id')->get()->take(5);

        // Recuperar Etiquetas
        $tags = Tag::all();

        // return $posts;
        return view('welcome', compact('posts', 'tags'));
    }

    public function mostrarBlog(){
    	return view('blog.index');
    }

    public function mostrarContact(){
    	return view('contact.index');
    }
}
