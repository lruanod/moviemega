<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descarga extends Model
{
    use HasFactory;

    protected $fillable =['servidord','logod'];

    public function descargas(){
        return $this->hasMany('App\Models\Descargapelicula','App\Models\Descargaprograma');
    }

}
