<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['name', 'slug'];

    use HasFactory;

    // RELACION UNO A MUCHOS
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
