<?php

namespace App\Http\Livewire;

use App\Models\Comentario;
use App\Models\Descargapelicula;
use App\Models\Descargaprograma;
use App\Models\Lenguajepelicula;
use App\Models\Lenguajeprograma;
use App\Models\Pcomentario;
use App\Models\Pelicula;
use App\Models\Programa;
use App\Models\Pscrim;
use App\Models\Scrim;
use App\Models\Servidorpelicula;
use Livewire\Component;
use Livewire\WithPagination;

class ShowprogramapComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $usuario,$descripcionc;
    public $programa_id;

    public function  mount($pro_id =null){
        $this->programa_id=$pro_id;
    }


    public function render()
    {
        return view('livewire.showprogramap-component',[
            'programas' => Programa::where('id','=',$this->programa_id)->get(),
            'scrims' => Pscrim::where('programa_id','=',$this->programa_id)->get(),
            'comentarios' => Pcomentario::where('programa_id','=',$this->programa_id)->paginate(8,['*'],'comentario2'),
            'lenguajeprogramas' => Lenguajeprograma::where('programa_id','=',$this->programa_id)->get(),
            'descargaprogramas'=> Descargaprograma::join('lenguajeprogramas','descargaprogramas.lenguajeprograma_id','lenguajeprogramas.id')->join('lenguajes','lenguajeprogramas.lenguaje_id','lenguajes.id')->join('descargas','descargaprogramas.descarga_id','descargas.id')->where('lenguajeprogramas.programa_id','=',$this->programa_id)->orderBy('descargaprogramas.id', 'DESC')->
            select('descargaprogramas.id','lenguajes.nombrel','lenguajes.descripcionl','descargas.logod','descargas.servidord')->get(),
        ]);
    }

    public function addcomentario(){
        $this->validate([
            'usuario'=> 'required|string|max:150',
            'descripcionc'=> 'required|string|max:5000',
            'programa_id'=> 'required|integer'

        ]);
        Pcomentario::create([
            'usuariopc'=> $this->usuario,
            'descripcionpc'=> $this->descripcionc,
            'programa_id'=> $this->programa_id
        ]);
        $this->msjexito();
        $this->default();
    }

    public function destroy($id){
        $comentario= Pcomentario::find($id);
        Pcomentario::destroy($id);
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
