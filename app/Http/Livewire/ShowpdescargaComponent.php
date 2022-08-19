<?php

namespace App\Http\Livewire;

use App\Models\Descargapelicula;
use App\Models\Descargaprograma;
use Livewire\Component;
use Livewire\WithPagination;

class ShowpdescargaComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $usuario,$descripcionc, $urld;
    public $descarga_id;

    public function  mount($des_id =null){
        $this->descarga_id=$des_id;
        $descargap= Descargaprograma::find($this->descarga_id);
        $this->urld=$descargap->urlp;
    }

    public function render()
    {
        return view('livewire.showpdescarga-component',[
            'descargaprogramas'=> Descargaprograma::where('id','=',$this->descarga_id)->get(),
        ]);
    }
}
