<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Asignacion Masiva
    protected $fillable = ['name', 'slug', 'color'];
    // Cantidad de Post Leídos
    protected $withCount = ['post'];
    use HasFactory;

    // RELACION MUCHOS A MUCHOS
    public function post(){
        return $this->belongsToMany(Post::class);
    }

    // RELACION UNO A UNO POLIMORFICA
    public function image_tag()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
