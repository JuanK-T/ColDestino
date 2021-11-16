<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{

    // ASIGNACION MASIVA
    protected $guarded = ['id'];

    use HasFactory;

    const LIKE = 1;
    const DISLIKE = 2;

    // RELACION POLIMORFICA
    public function reactionable()
    {
        return $this->morphTo();
    }

    // RELACION MUCHOS A UNO
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
