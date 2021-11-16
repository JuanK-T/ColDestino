<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // ASIGNACION MASIVA
    protected $guarded = ['id'];

    use HasFactory;

    // RELACION POLIMORFICA
    public function commentable()
    {
        return $this->morphTo();
    }

    // RELACION UNO A MUCHOS POLIMORFICA
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function reactions()
    {
        return $this->morphMany(Reaction::class, 'reactionable');
    }

    // RELACION MUCHOS A UNO
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
