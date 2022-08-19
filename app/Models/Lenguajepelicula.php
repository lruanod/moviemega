<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lenguajepelicula extends Model
{
    use HasFactory;

    protected $fillable =['pelicula_id','lenguaje_id'];

    public function pelicula(){
        return $this->belongsTo('App\Models\Pelicula');
    }

    public function lenguaje(){
        return $this->belongsTo('App\Models\Lenguaje');
    }

    public function lenguajepeliculas(){
        return $this->hasMany('App\Models\Descargapelicula');
    }
}
