<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Lenguaje;
use App\Models\Lenguajepelicula;
use App\Models\Lenguajeprograma;
use App\Models\Pcategoria;
use App\Models\Pelicula;
use App\Models\Programa;
use Livewire\Component;
use Livewire\WithPagination;

class IndexpComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $btncategoria, $btnlenguaje;
    public $buscar;

    public function  mount(){
        $this->btncategoria='';
        $this->btnlenguaje='';
        $this->buscar='';
    }

    public function getProgramasProperty(){
        if(!empty($this->buscar)) {
            $busqueda = '%' . $this->buscar . '%';
            return  Programa::join('lenguajeprogramas','programas.id','lenguajeprogramas.programa_id')->where('programas.nombrep', 'like', $busqueda)->where('programas.estado','=','Habilitado')->orderBy('programas.id', 'DESC')->
            select('programas.id','programas.nombrep','programas.descripcionp','programas.portadap','programas.pcategoria_id','lenguajeprogramas.programa_id','lenguajeprogramas.lenguaje_id')->paginate(30,['*'],'prog');
        }
        if(!empty($this->btncategoria)) {
            return  Programa::join('lenguajeprogramas','programas.id','lenguajeprogramas.programa_id')->where('programas.pcategoria_id','=',$this->btncategoria)->where('programas.estado','=','Habilitado')->orderBy('programas.id', 'DESC')->
            select('programas.id','programas.nombrep','programas.descripcionp','programas.portadap','programas.pcategoria_id','lenguajeprogramas.programa_id','lenguajeprogramas.lenguaje_id')->paginate(30,['*'],'prog');
        }

        if(!empty($this->btnlenguaje)) {;
            return  Programa::join('lenguajeprogramas','programas.id','lenguajeprogramas.programa_id')->where('lenguajeprogramas.lenguaje_id','=',$this->btnlenguaje)->orderBy('programas.id', 'DESC')->
            select('programas.id','programas.nombrep','programas.descripcionp','programas.portadap','programas.pcategoria_id','lenguajeprogramas.programa_id','lenguajeprogramas.lenguaje_id')->paginate(8,['*'],'prog');
        }

        if(empty($this->buscar && $this->btncategoria && $this->btnlenguaje) ){
            return  Programa::join('lenguajeprogramas','programas.id','lenguajeprogramas.programa_id')->where('programas.estado','=','Habilitado')->orderBy('programas.id', 'DESC')->
            select('programas.id','programas.nombrep','programas.descripcionp','programas.portadap','programas.pcategoria_id','lenguajeprogramas.programa_id','lenguajeprogramas.lenguaje_id')->paginate(30,['*'],'prog');
        }

    }


    public function render()
    {
        return view('livewire.indexp-component',[
            'programas' => $this->getProgramasProperty(),
            'lenguajes'  => Lenguaje::all(),
            'categorias'=> Pcategoria::where('estado','=','Habilitado')->get(),
            'lenguaje_programas' => Lenguajeprograma::all(),
            'lenguaje_programas2' =>Lenguajeprograma::all(),
            'programas2'=> Programa::latest()->take(30)->get(),

        ]);
    }

    public function blenguaje($id){
        $this->buscar='';
        $this->btncategoria='';
        $this->btnlenguaje=$id;
    }
    public function bcategoria($id){
        $this->buscar='';
        $this->btncategoria='';
        $this->btncategoria=$id;
    }

    public function bbuscar(){
        $this->btncategoria='';
        $this->btncategoria='';
    }




}
