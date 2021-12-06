<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    // ASIGNACION MASIVA
    protected $fillable = ['url'];

    use HasFactory;

    // RELACION POLIMORFICA
    public function imageable(){
        return $this->morphTo();
    }
}
