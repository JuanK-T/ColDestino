<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

use Illuminate\Support\Facades\Storage;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = [
            'gray' => 'Gris',
            'red' => 'Rojo',
            'yellow' => 'Amarillo',
            'green' => 'Verde',
            'blue' => 'Azul',
            'indigo' => 'Indigo',
            'pink' => 'Rosado',
            'purple' => 'Morado'
        ];
        return view('admin.tags.create', compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags',
            'color' => 'required',
            'file' => 'image|max:2048'
        ]);

        $tag = Tag::create($request->all());
        if($request->file('file')){
            $url = Storage::put('public/tags', $request->file('file'));
            $tag->image()->create([
                'url' => $url,
                'imageable_id' => $request->id,
                'imageable_type' => Tag::class
            ]);
        }

        return redirect()->route('admin.tags.edit', compact('tag'))->with('info', 'La Etiqueta se registró con éxito');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $colors = [
            'gray' => 'Gris',
            'red' => 'Rojo',
            'yellow' => 'Amarillo',
            'green' => 'Verde',
            'blue' => 'Azul',
            'indigo' => 'Indigo',
            'pink' => 'Rosado',
            'purple' => 'Morado'
        ];
        return view('admin.tags.edit', compact('tag', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:tags,slug,$tag->id",
            'color' => 'required',
            'file' => 'image|max:2048'
        ]);

        if($request->file('file')){
            $url = Storage::put('public/tags', $request->file('file'));
            if($tag->image){
                Storage::delete($tag->image->url);
                $tag->image->update([
                    'url' => $url
                ]);
            }else{
                $tag->image()->create([
                    'url' => $url
                ]);
            }
        }

        $tag->update($request->all());
        return redirect()->route('admin.tags.edit', $tag)->with('info', 'La Etiqueta se actualizo con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('eliminar', 'ok');
    }
}
