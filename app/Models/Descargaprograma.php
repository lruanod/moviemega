<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descargaprograma extends Model
{
    use HasFactory;
    protected $fillable =['urlp','lenguajeprograma_id','descarga_id'];

    public function lenguajeprograma(){
        return $this->belongsTo('App\Models\Lenguajeprograma');
    }

    public function descarga(){
        return $this->belongsTo('App\Models\Descarga');
    }
}
