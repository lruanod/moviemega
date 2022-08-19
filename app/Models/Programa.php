<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;
    protected $fillable =['nombrep','descripcionp','portadap','estado','pcategoria_id'];

    public function pcategoria(){
        return $this->belongsTo('App\Models\Pcategoria');
    }

    public function programas(){
        return $this->hasMany('App\Models\Lenguajeprograma','App\Models\Pscrim','App\Models\Pcomentario');
    }
}
