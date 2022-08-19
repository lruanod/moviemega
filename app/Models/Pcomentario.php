<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pcomentario extends Model
{
    use HasFactory;
    protected $fillable =['usuariopc','descripcionpc','programa_id'];


    public function programa(){
        return $this->belongsTo('App\Models\Programa');
    }
}
