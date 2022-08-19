<?php

namespace App\Http\Livewire;

use App\Models\Descarga;
use App\Models\Servidor;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
Use Storage;

class ServidorComponent extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme ="bootstrap";
    public $servidor_id,$nombres,$logos,$logos2,$logos3, $identificador,$identificador2;
    public $buscar;


    public function  mount(){
        $this->identificador = rand();
        $this->identificador2 = rand();
    }
    public function getServidorsProperty(){

        $busqueda='%'.$this->buscar.'%';
        return Servidor::where('nombres','like',$busqueda)->paginate(8,['*'],'servidorx');
    }
    public function render()
    {
        return view('livewire.servidor-component',[
            'servidors' => $this->getServidorsProperty()
        ]);
    }
    public function store(){
        $this->validate([
            'nombres'=> 'required|string|max:150',
            'logos'=> 'required|image|max:2048'
        ]);

        /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
        $image= $this->logos->store('logos','public');
        /*fin*/
        Servidor::create([
            'nombres'=> $this->nombres,
            'logos'=> $image
        ]);
        $this->msjexito();
        $this->default();
    }

    public function edit($id){
        $servidor= Servidor::find($id);
        $this->servidor_id = $servidor->id;
        $this->nombres = $servidor->nombres;
        $this->logos3 = $servidor->logos;
    }

    public function update(){
        $this->validate([
            'nombres'=> 'required|string|max:150',
        ]);
        $servidor= Servidor::find($this->servidor_id);
        if(!empty($this->logos2)){
            // eliminar archivo existente
            Storage::disk('public')->delete($servidor->logos);
            //eliminar

            /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
            $image= $this->logos2->store('logos','public');
            /*fin*/
            $servidor->update([
                'nombres'=> $this->nombres,
                'logos'=> $image
            ]);
        } else{
            $servidor->update([
                'nombres'=> $this->nombres,
            ]);
        }

        $this->msjedit();
        $this->default();
    }

    public function default(){
        $this->nombres = '';
        $this->logos = '';
        $this->logos2 = '';
        $this->logos3 = '';
        $this->buscar = '';
        $this->identificador = rand();
        $this->identificador2 = rand();

    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Servidor registrado correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Servidor editado correctamente']);
    }
}
