<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{

    // ASIGNACION MASIVA
    protected $guarded = ['id'];

    use HasFactory;

    // RELACION POLIMORFICA
    public function resourceable()
    {
        return $this->morphTo();
    }

}
