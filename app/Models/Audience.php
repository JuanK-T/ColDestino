<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audience extends Model
{
    protected $guarded = ['id'];

    use HasFactory;

    // RELACION MUCHOS A UNO
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
