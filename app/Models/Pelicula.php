<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;
    protected $fillable =['nombre','sinopsis','calidad','festreno','trailer','portada','estrella','estado','categoria_id'];


    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }

    public function peliculas(){

        return $this->hasMany('App\Models\Lenguajepelicula','App\Models\Scrim','App\Models\Comentario');
    }
}
