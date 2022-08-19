<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lenguajeprograma extends Model
{
    use HasFactory;

    protected $fillable =['programa_id','lenguaje_id'];

    public function programa(){
        return $this->belongsTo('App\Models\Programa');
    }

    public function lenguaje(){
        return $this->belongsTo('App\Models\Lenguaje');
    }

    public function lenguajeprogramas(){
        return $this->hasMany('App\Models\Descargaprograma');
    }
}
