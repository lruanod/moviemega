<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Lenguaje;
use App\Models\Lenguajepelicula;
use App\Models\Pelicula;
use Livewire\Component;
use Livewire\WithPagination;

class IndexComponent extends Component
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

    public function getPeliculasProperty(){
        if(!empty($this->buscar)) {
            $busqueda = '%' . $this->buscar . '%';
            return  Pelicula::join('lenguajepeliculas','peliculas.id','lenguajepeliculas.pelicula_id')->where('peliculas.nombre', 'like', $busqueda)->where('peliculas.estado','=','Habilitado')->orderBy('peliculas.id', 'DESC')->
            select('peliculas.id','peliculas.nombre','peliculas.calidad','peliculas.festreno','peliculas.estrella','peliculas.portada','peliculas.categoria_id','lenguajepeliculas.pelicula_id','lenguajepeliculas.lenguaje_id')->paginate(30,['*'],'pelicu');
        }
        if(!empty($this->btncategoria)) {
            return  Pelicula::join('lenguajepeliculas','peliculas.id','lenguajepeliculas.pelicula_id')->where('peliculas.categoria_id','=',$this->btncategoria)->where('peliculas.estado','=','Habilitado')->where('peliculas.categoria_id','=',$this->btncategoria)->orderBy('peliculas.id', 'DESC')->
            select('peliculas.id','peliculas.nombre','peliculas.calidad','peliculas.festreno','peliculas.estrella','peliculas.portada','peliculas.categoria_id','lenguajepeliculas.pelicula_id','lenguajepeliculas.lenguaje_id')->paginate(30,['*'],'pelicu');
        }

        if(!empty($this->btnlenguaje)) {;
            return  Pelicula::join('lenguajepeliculas','peliculas.id','lenguajepeliculas.pelicula_id')->where('lenguajepeliculas.lenguaje_id','=',$this->btnlenguaje)->orderBy('peliculas.id', 'DESC')->
            select('peliculas.id','peliculas.nombre','peliculas.calidad','peliculas.festreno','peliculas.estrella','peliculas.portada','peliculas.categoria_id','lenguajepeliculas.pelicula_id','lenguajepeliculas.lenguaje_id')->paginate(8,['*'],'pelicu');
        }

        if(empty($this->buscar && $this->btncategoria && $this->btnlenguaje) ){
            return  Pelicula::join('lenguajepeliculas','peliculas.id','lenguajepeliculas.pelicula_id')->where('peliculas.estado','=','Habilitado')->orderBy('peliculas.id', 'DESC')->
            select('peliculas.id','peliculas.nombre','peliculas.calidad','peliculas.festreno','peliculas.estrella','peliculas.portada','peliculas.categoria_id','lenguajepeliculas.pelicula_id','lenguajepeliculas.lenguaje_id')->paginate(30,['*'],'pelicu');
        }

    }


    public function render()
    {
        return view('livewire.index-component',[
            'peliculas' => $this->getPeliculasProperty(),
            'lenguajes'  => Lenguaje::all(),
            'categorias'=> Categoria::where('estado','=','Habilitado')->get(),
            'lenguaje_peliculas' => Lenguajepelicula::all(),
            'lenguaje_peliculas2' =>Lenguajepelicula::all(),
            'peliculas2'=> Pelicula::latest()->take(30)->get(),

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


