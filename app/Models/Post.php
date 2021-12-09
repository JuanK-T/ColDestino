<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Asignacion Masiva
    protected $guarded = ['id', 'created_at', 'update_at'];
    // Cantidad de Post Leídos
    protected $withCount = ['visits', 'reviews'];

    use HasFactory;

    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    // Solicitu crear un nuevo atributo
    public function getRatingAttribute(){
        if($this->reviews_count){
            // Me retorna la coleccion
            return round($this->reviews->avg('rating'), 1);
        }else{
            return 5;
        }
    }

    // QueryScopes
    public function scopeCategory($query, $category_id)
    {
        if($category_id){
            return $query->where('category_id', $category_id);
        }
    }
    // FALTA PARA TAGS


    // URL Amigable
    public function getRouteKeyName()
    {
        return "slug";
    }

    // RELACION MUCHOS A UNO
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    // RELACION MUCHOS A MUCHOS
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function visits(){
        return $this->belongsToMany(User::class);
    }

    // RELACION UNO A UNO POLIMORFICA
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    // RELACION UNO A MUCHOS
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function audiences()
    {
        return $this->hasMany(Audience::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
