<?php

namespace App\Http\Livewire;


use App\Models\Servidorpelicula;
use Livewire\Component;
use Livewire\WithPagination;

class ShowonlineComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $urls;
    public $descarga_id;

    public function  mount($des_id =null){
        $this->descarga_id=$des_id;
        $descargap= Servidorpelicula::find($this->descarga_id);
        $this->urls=$descargap->urls;
    }

    public function render()
    {
        return view('livewire.showonline-component',[
            'servidorpeliculas'=> Servidorpelicula::where('id','=',$this->descarga_id)->get(),
        ]);
    }
}
