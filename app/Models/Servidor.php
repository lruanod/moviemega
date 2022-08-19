<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servidor extends Model
{
    use HasFactory;
    protected $fillable =['nombres','logos'];

    public function servidors(){
        return $this->hasMany('App\Models\Servidorpelicula');
    }
}
