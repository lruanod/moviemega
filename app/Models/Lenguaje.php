<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lenguaje extends Model
{
    use HasFactory;

    protected $fillable =['nombrel','descripcionl','bandera'];

    /***  relacion de categoria a muchos pelicualas**/
    public function lenguajes(){
        return $this->hasMany('App\Models\Lenguajepelicula','App\Models\Lenguajeprograma');
    }
}
