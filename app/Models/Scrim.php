<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scrim extends Model
{
    use HasFactory;
    protected $fillable =['urls','pelicula_id'];

    public function pelicula(){
        return $this->belongsTo('App\Models\Pelicula');
    }
}
