<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    // ASIGNACION MASIVA
    protected $guarded = ['id'];

    use HasFactory;

    // RELACION POLIMORFICA
    public function imageable(){
        return $this->morphTo();
    }
}
