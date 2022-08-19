<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Pcategoria;
use Livewire\Component;
use Livewire\WithPagination;

class PcategoriaComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $pcategoria_id,$nombrepc,$estado;
    public $buscar;

    public function getCategoriasProperty(){
        $busqueda='%'.$this->buscar.'%';
        return Pcategoria::where('nombrepc','like',$busqueda)->paginate(8,['*'],'pcategoria');
    }

    public function render()
    {
        return view('livewire.pcategoria-component',[
            'pcategorias' => $this->getCategoriasProperty()
        ]);
    }
    public function store(){
        $this->validate([
            'nombrepc'=> 'required|string|max:75',
            'estado'=> 'required|string|max:45',
        ]);
        Pcategoria::create([
            'nombrepc'=> $this->nombrepc,
            'estado'=> $this->estado
        ]);
        $this->msjexito();
        $this->default();
    }

    public function edit($id){
        $pcategoria=Pcategoria::find($id);
        $this->pcategoria_id = $pcategoria->id;
        $this->nombrepc = $pcategoria->nombrepc;
        $this->estado = $pcategoria->estado;
    }

    public function update(){
        $this->validate([
            'nombrepc'=> 'required|string|max:75',
            'estado'=> 'required|string|max:45',
        ]);

        $pcategoria= Pcategoria::find($this->pcategoria_id);
        $pcategoria->update([
            'nombrepc'=> $this->nombrepc,
            'estado'=> $this->estado
        ]);
        $this->msjedit();
        $this->default();

    }


    public function default(){
        $this->nombrepc = '';
        $this->estado = '';
        $this->buscar = '';
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Categoría registrada correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Categoría editada correctamente']);
    }
}
