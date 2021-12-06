<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use App\Models\Section;
use Livewire\Component;

class PostCurriculum extends Component
{
    public $post, $section, $subtitle, $description;

    // Regla de validacion
    protected $rules = [
        'section.subtitle' => 'required',
        'section.description' => 'required'
    ];

    // Escuchar un evento
    protected $listeners = ['render', 'destroy', 'update', 'resetear'];

    public function mount(Post $post){
        $this->post = $post;
        $this->section = new Section();
    }

    public function render()
    {
        return view('livewire.admin.post-curriculum')->layout('layouts.post',['post' => $this->post]);
    }

    public function store(){

        $this->validate([
            'subtitle' => 'required',
        ]);

        Section::create([
            'subtitle' => $this->subtitle,
            'description' => $this->description,
            'post_id' => $this->post->id
        ]);
        // Resetar luego de crear la seccion
        $this->reset('subtitle');
        $this->reset('description');
        // Refresacar la informacion
        $this->post = Post::find($this->post->id);
    }

    public function edit(Section $section){
        $this->resetValidation();
        $this->section = $section;
    }

    public function update(){
        $this->validate();
        $this->section->save();
        $this->section = new Section();
        // Refresacar la informacion
        $this->post = Post::find($this->post->id);
    }

    public function resetear(){
        $this->reset('subtitle');
        $this->reset('description');
    }

    public function destroy(Section $section){
        $section->delete();
        // Refresacar la informacion
        $this->post = Post::find($this->post->id);
    }
}
