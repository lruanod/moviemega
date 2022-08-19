<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    protected $fillable =['usuario','descripcionc','pelicula_id'];


    public function pelicula(){
        return $this->belongsTo('App\Models\Pelicula');
    }
}
