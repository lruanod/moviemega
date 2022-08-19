<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pcategoria extends Model
{
    use HasFactory;
    protected $fillable =['nombrepc','estado'];

    /***  relacion de categoria a muchos pelicualas**/
    public function pcategorias(){

        return $this->hasMany('App\Models\Programa');
    }
}
