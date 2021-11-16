<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

    // ASIGNACION MASIVA
    protected $guarded = ['id'];

    use HasFactory;

    // RELACION MUCHOS A UNO
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // RELACION UNO A UNO POLIMORFICA
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
