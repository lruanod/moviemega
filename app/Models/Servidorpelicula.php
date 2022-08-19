<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servidorpelicula extends Model
{
    use HasFactory;
    protected $fillable =['urls','lenguajepelicula_id','servidor_id'];

    public function lenguajepelicula(){
        return $this->belongsTo('App\Models\Lenguajepelicula');
    }

    public function servidor(){
        return $this->belongsTo('App\Models\Servidor');
    }
}
