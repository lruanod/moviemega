<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descargapelicula extends Model
{
    use HasFactory;

    protected $fillable =['urld','lenguajepelicula_id','descarga_id'];

    public function lenguajepelicula(){
        return $this->belongsTo('App\Models\Lenguajepelicula');
    }

    public function descarga(){
        return $this->belongsTo('App\Models\Descarga');
    }
}
