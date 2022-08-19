<?php

namespace App\Http\Livewire;

use App\Models\Descarga;
use App\Models\Lenguaje;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
Use Storage;

class DescargaComponent extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme ="bootstrap";
    public $descarga_id,$servidord,$logod,$logod2,$logod3, $identificador,$identificador2;
    public $buscar;


    public function  mount(){
        $this->identificador = rand();
        $this->identificador2 = rand();
    }
    public function getDescargasProperty(){

        $busqueda='%'.$this->buscar.'%';
        return Descarga::where('servidord','like',$busqueda)->paginate(8,['*'],'descargax');
    }
    public function render()
    {
        return view('livewire.descarga-component',[
            'descargas' => $this->getDescargasProperty()
        ]);
    }
    public function store(){
        $this->validate([
            'servidord'=> 'required|string|max:150',
            'logod'=> 'required|image|max:2048'
        ]);

        /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
        $image= $this->logod->store('logos','public');
        /*fin*/
        Descarga::create([
            'servidord'=> $this->servidord,
            'logod'=> $image
        ]);
        $this->msjexito();
        $this->default();
    }

    public function edit($id){
        $descarga= Descarga::find($id);
        $this->descarga_id = $descarga->id;
        $this->servidord = $descarga->servidord;
        $this->logod3 = $descarga->logod;
    }

    public function update(){
        $this->validate([
            'servidord'=> 'required|string|max:150',
        ]);
        $descarga= Descarga::find($this->descarga_id);
        if(!empty($this->logod2)){
            // eliminar archivo existente
            Storage::disk('public')->delete($descarga->logod);
            //eliminar

            /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
            $image= $this->logod2->store('logos','public');
            /*fin*/
            $descarga->update([
                'servidord'=> $this->servidord,
                'logod'=> $image
            ]);
        } else{
            $descarga->update([
                'servidord'=> $this->servidord,
            ]);
        }

        $this->msjedit();
        $this->default();
    }

    public function default(){
        $this->servidord = '';
        $this->logod = '';
        $this->logod2 = '';
        $this->logod3 = '';
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
