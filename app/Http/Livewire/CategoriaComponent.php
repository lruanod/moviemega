<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriaComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $categoria_id,$nombrec,$estado;
    public $buscar;

    public function getCategoriasProperty(){
        $busqueda='%'.$this->buscar.'%';
        return Categoria::where('nombrec','like',$busqueda)->paginate(8,['*'],'categoria');
    }

    public function render()
    {
        return view('livewire.categoria-component',[
            'categorias' => $this->getCategoriasProperty()
        ]);
    }
    public function store(){
        $this->validate([
            'nombrec'=> 'required|string|max:75',
            'estado'=> 'required|string|max:45',
        ]);
        Categoria::create([
            'nombrec'=> $this->nombrec,
            'estado'=> $this->estado
        ]);
        $this->msjexito();
        $this->default();
    }

    public function edit($id){
        $categoria= Categoria::find($id);
        $this->categoria_id = $categoria->id;
        $this->nombrec = $categoria->nombrec;
        $this->estado = $categoria->estado;
    }

    public function update(){
        $this->validate([
            'nombrec'=> 'required|string|max:75',
            'estado'=> 'required|string|max:45',
        ]);

        $categoria= Categoria::find($this->categoria_id);
        $categoria->update([
            'nombrec'=> $this->nombrec,
            'estado'=> $this->estado
        ]);
        $this->msjedit();
        $this->default();

    }


    public function default(){
        $this->nombrec = '';
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
