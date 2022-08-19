<?php

namespace App\Http\Livewire;

use App\Models\Lenguaje;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
Use Storage;

class LenguajeComponent extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme ="bootstrap";
    public $lenguaje_id,$nombrel,$descripcionl,$bandera,$bandera2,$bandera3, $identificador,$identificador2;
    public $buscar;


    public function  mount(){
        $this->identificador = rand();
        $this->identificador2 = rand();
    }
    public function getLenguajesProperty(){

        $busqueda='%'.$this->buscar.'%';
        return Lenguaje::where('nombrel','like',$busqueda)->orwhere('descripcionl','like',$busqueda)->paginate(8,['*'],'lenguaje');
    }
    public function render()
    {
        return view('livewire.lenguaje-component',[
            'lenguajes' => $this->getLenguajesProperty()
        ]);
    }
    public function store(){
        $this->validate([
            'nombrel'=> 'required|string|max:75',
            'descripcionl'=> 'required|string|max:200',
            'bandera'=> 'required|image|max:2048'
        ]);

        /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
        $image= $this->bandera->store('banderas','public');
        /*fin*/
        Lenguaje::create([
            'nombrel'=> $this->nombrel,
            'descripcionl'=> $this->descripcionl,
            'bandera'=> $image
        ]);
        $this->msjexito();
        $this->default();
    }

    public function edit($id){
        $lenguaje= Lenguaje::find($id);
        $this->lenguaje_id = $lenguaje->id;
        $this->nombrel = $lenguaje->nombrel;
        $this->descripcionl = $lenguaje->descripcionl;
        $this->bandera3 = $lenguaje->bandera;
    }

    public function update(){
        $this->validate([
            'nombrel'=> 'required|string|max:75',
            'descripcionl'=> 'required|string|max:200'
        ]);
        $lenguaje= Lenguaje::find($this->lenguaje_id);
        if(!empty($this->bandera2)){
            // eliminar archivo existente
            Storage::disk('public')->delete($lenguaje->bandera);
            //eliminar

            /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
            $image= $this->bandera2->store('banderas','public');
            /*fin*/
            $lenguaje->update([
                'nombrel'=> $this->nombrel,
                'descripcionl'=> $this->descripcionl,
                'bandera'=> $image
            ]);
        } else{
            $lenguaje->update([
                'nombrel'=> $this->nombrel,
                'descripcionl'=> $this->descripcionl
            ]);
        }

        $this->msjedit();
        $this->default();
    }

    public function default(){
        $this->nombrel = '';
        $this->descripcionl = '';
        $this->bandera = '';
        $this->bandera2 = '';
        $this->bandera3 = '';
        $this->buscar = '';
        $this->identificador = rand();
        $this->identificador2 = rand();

    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Lenguaje registrado correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Lenguaje editado correctamente']);
    }
}
