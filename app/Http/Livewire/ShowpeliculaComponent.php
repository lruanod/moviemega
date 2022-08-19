<?php

namespace App\Http\Livewire;

use App\Models\Comentario;
use App\Models\Descargapelicula;
use App\Models\Lenguajepelicula;
use App\Models\Pelicula;
use App\Models\Scrim;
use App\Models\Servidorpelicula;
use Livewire\Component;
use Livewire\WithPagination;
Use Storage;

class ShowpeliculaComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $usuario,$descripcionc;
    public $pelicula_id;

    public function  mount($pel_id =null){
        $this->pelicula_id=$pel_id;
    }


    public function render()
    {
        return view('livewire.showpelicula-component',[
            'peliculas' => Pelicula::where('id','=',$this->pelicula_id)->get(),
            'scrims' => Scrim::where('pelicula_id','=',$this->pelicula_id)->get(),
            'comentarios' => Comentario::where('pelicula_id','=',$this->pelicula_id)->paginate(8,['*'],'comentario2'),
            'lenguajepeliculas' => Lenguajepelicula::where('pelicula_id','=',$this->pelicula_id)->get(),
            'descargapeliculas'=> Descargapelicula::join('lenguajepeliculas','descargapeliculas.lenguajepelicula_id','lenguajepeliculas.id')->join('lenguajes','lenguajepeliculas.lenguaje_id','lenguajes.id')->join('descargas','descargapeliculas.descarga_id','descargas.id')->where('lenguajepeliculas.pelicula_id','=',$this->pelicula_id)->orderBy('descargapeliculas.id', 'DESC')->
             select('descargapeliculas.id','lenguajes.nombrel','lenguajes.descripcionl','descargas.logod','descargas.servidord')->get(),
            'servidorpeliculas'=> Servidorpelicula::join('lenguajepeliculas','servidorpeliculas.lenguajepelicula_id','lenguajepeliculas.id')->join('lenguajes','lenguajepeliculas.lenguaje_id','lenguajes.id')->join('servidors','servidorpeliculas.servidor_id','servidors.id')->where('lenguajepeliculas.pelicula_id','=',$this->pelicula_id)->
            select('servidorpeliculas.id','lenguajes.nombrel','lenguajes.descripcionl','servidors.logos','servidors.nombres')->orderBy('servidorpeliculas.id', 'DESC')->get()


        ]);
    }

    public function addcomentario(){
        $this->validate([
            'usuario'=> 'required|string|max:150',
            'descripcionc'=> 'required|string|max:5000',
            'pelicula_id'=> 'required|integer'

        ]);
        Comentario::create([
            'usuario'=> $this->usuario,
            'descripcionc'=> $this->descripcionc,
            'pelicula_id'=> $this->pelicula_id
        ]);
        $this->msjexito();
        $this->default();
    }

    public function destroy($id){
        $comentario= Comentario::find($id);
        Comentario::destroy($id);
        $this->msjdelete();
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Comentario registrado correctamente']);
    }

    public function msjdelete(){
        $this->dispatchBrowserEvent('alert3',['message'=>'Comentario eliminado correctamente']);
    }

    public function default(){
        $this->usuario='';
        $this->descripcionc='';
    }
}
