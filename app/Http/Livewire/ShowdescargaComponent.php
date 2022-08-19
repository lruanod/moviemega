<?php

namespace App\Http\Livewire;

use App\Models\Comentario;
use App\Models\Descargapelicula;
use App\Models\Lenguajepelicula;
use App\Models\Pelicula;
use App\Models\Scrim;
use App\Models\Servidor;
use App\Models\Servidorpelicula;
use Livewire\Component;
use Livewire\WithPagination;

class ShowdescargaComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $usuario,$descripcionc, $urld;
    public $descarga_id;

    public function  mount($des_id =null){
        $this->descarga_id=$des_id;
        $descargap= Descargapelicula::find($this->descarga_id);
        $this->urld=$descargap->urld;
    }

    public function render()
    {
        return view('livewire.showdescarga-component',[
            'descargapeliculas'=> Descargapelicula::where('id','=',$this->descarga_id)->get(),
        ]);
    }

}
