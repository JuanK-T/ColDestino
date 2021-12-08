<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    // ASIGNACION MASIVA
    protected $guarded = ['id'];

    // protected $withCount = ['replies'];

    use HasFactory;

    // Solicitu crear un nuevo atributo
    /* public function getReplyAttribute(){
        if($this->replies_count){
            // Me retorna la coleccion
            return $this->replies->count('value')->where('value', 1);
        }else{
            return 0;
        }
    } */

    // RELACION MUCHOS A UNO
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // RELACION UNO A MUCHOS
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
