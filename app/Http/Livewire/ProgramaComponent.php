<?php

namespace App\Http\Livewire;

use App\Models\Descarga;
use App\Models\Descargaprograma;
use App\Models\Lenguaje;
use App\Models\Lenguajeprograma;
use App\Models\Pcategoria;
use App\Models\Programa;
use App\Models\Pscrim;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
Use Storage;

class ProgramaComponent extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme ="bootstrap";
    public $programa_id,$nombrep,$descripcionp,$portadap,$portadap2,$portadap3,$estado,$pcategoria_id, $identificador,$identificador2;
    public $lenguaje_id, $lenguajeprograma_id,$nombreprograma;
    public $urlp, $descarga_id;
    public $urls=[],$urls2,$urls3,$pscrim_id,$identificador3;

    public $buscar;

    public function  mount(){
        $this->identificador = rand();
        $this->identificador2 = rand();
        $this->identificador3 = rand();
        $this->pcategoria_id='';
    }
    public function getProgramasProperty(){
        $busqueda='%'.$this->buscar.'%';
        if(!empty($this->pcategoria_id)){
            return Programa::where('pcategoria_id','=',$this->pcategoria_id)->orderBy('id', 'DESC')->paginate(8,['*'],'programa2');
        }
        else {
            return Programa::where('nombrep','like',$busqueda)->orwhere('descripcionp','like',$busqueda)->orderBy('id', 'DESC')->paginate(8,['*'],'programa2');
        }
    }
    public function render()
    {
        return view('livewire.programa-component',[
            'programas' => $this->getProgramasProperty(),
            'pcategorias'=> Pcategoria::where('estado','=','Habilitado')->get(),
            'lenguajes' => Lenguaje::all(),
            'descargas' => Descarga::all(),
            'descargaprogramas'=> Descargaprograma::join('lenguajeprogramas','descargaprogramas.lenguajeprograma_id','lenguajeprogramas.id')->join('descargas','descargaprogramas.descarga_id','descargas.id')->join('lenguajes','lenguajeprogramas.lenguaje_id','lenguajes.id')->where('lenguajeprogramas.programa_id','=',$this->programa_id)->orderBy('descargaprogramas.id', 'DESC')->select('descargaprogramas.id','descargaprogramas.urlp','descargas.id as descarga_id','descargas.servidord','descargas.logod','lenguajes.id as len_id','lenguajes.nombrel','lenguajes.bandera','lenguajes.descripcionl')->paginate(8,['*'],'descargap'),
            'lenguajeprogramas' => Lenguajeprograma::where('programa_id','=',$this->programa_id)->orderBy('id', 'DESC')->paginate(8,['*'],'lengup'),
            'pscrims' => Pscrim::where('programa_id','=',$this->programa_id)->orderBy('id', 'DESC')->paginate(8,['*'],'scri ')
        ]);
    }
    public function store(){
        $this->validate([
            'nombrep'=> 'required|string|max:100',
            'descripcionp'=> 'required|string|max:5000',
            'portadap'=> 'required|image|max:2048',
            'estado'=> 'required|string|max:45',
            'pcategoria_id'=> 'required|integer'

        ]);

        /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
        $image= $this->portadap->store('portada_programas','public');
        /*fin*/
        Programa::create([
            'nombrep'=> $this->nombrep,
            'descripcionp'=> $this->descripcionp,
            'portadap'=> $image,
            'estado'=> $this->estado,
            'pcategoria_id'=> $this->pcategoria_id
        ]);
        $this->msjexito();
        $this->default();
    }

    public function edit($id){
        $programa= Programa::find($id);
        $this->programa_id = $programa->id;
        $this->nombrep = $programa->nombrep;
        $this->descripcionp = $programa->descripcionp;
        $this->portadap3 = $programa->portadap;
        $this->estado = $programa->estado;
        $this->pcategoria_id = $programa->pcategoria_id;
    }

    public function update(){
        $this->validate([
            'nombrep'=> 'required|string|max:100',
            'descripcionp'=> 'required|string|max:5000',
            'estado'=> 'required|string|max:45',
            'pcategoria_id'=> 'required|integer'
        ]);
        $programa= Programa::find($this->programa_id);
        if(!empty($this->portadap2)){
            // eliminar archivo existente
            Storage::disk('public')->delete($programa->portadap);
            //eliminar
            /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
            $image= $this->portadap2->store('portada_programas','public');
            /*fin*/
            $programa->update([
                'nombrep'=> $this->nombrep,
                'descripcionp'=> $this->descripcionp,
                'portadap'=> $image,
                'estado'=> $this->estado,
                'pcategoria_id'=> $this->pcategoria_id
            ]);
        } else{
            $programa->update([
                'nombrep'=> $this->nombrep,
                'descripcionp'=> $this->descripcionp,
                'estado'=> $this->estado,
                'pcategoria_id'=> $this->pcategoria_id
            ]);
        }

        $this->msjedit();
        $this->default();
    }

    public  function addlenguaje(){
        $this->validate([
            'programa_id'=> 'required|integer',
            'lenguaje_id'=> 'required|integer'
        ]);

        Lenguajeprograma::create([
            'programa_id'=> $this->programa_id,
            'lenguaje_id'=> $this->lenguaje_id
        ]);
        $this->msjexitol();
        $this->default();

    }
    public  function adddescarga(){
        $this->validate([
            'urlp'=> 'required|string|max:150',
            'lenguajeprograma_id'=> 'required|integer',
            'descarga_id'=> 'required|integer'
        ]);

        Descargaprograma::create([
            'urlp'=> $this->urlp,
            'lenguajeprograma_id'=> $this->lenguajeprograma_id,
            'descarga_id'=> $this->descarga_id
        ]);
        $this->msjexitod();
        $this->default();

    }

    public  function bscrim($id){
        // buscar id de pelicula
        $programa=programa::find($id);
        $this->programa_id=$programa->id;
        $this->nombreprograma=$programa->nombrep;
    }
    public function addscrim(){
        $this->validate([
            'urls.*'=> 'required|image|max:2048',
            'programa_id'=> 'required|integer'
        ]);
        foreach ($this->urls as $key => $image){
            /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
            // $image= $this->url->store('portadas','public');
            $image= $this->urls[$key]->store('scrim_programas','public');
            /*fin*/
            // registrar url de imagen con su respectivo id de entrada
            Pscrim::create([
                'urls'=> $image,
                'programa_id'=> $this->programa_id
            ]);
        }
        $this->msjexito2();
        $this->default();
    }

    public function destroys($id){
        $pscrim= Pscrim::find($id);
        // eliminar archivo existente
        Storage::disk('public')->delete($pscrim->urls);
        //eliminar
        Pscrim::destroy($id);
        $this->msjdelete();
    }

    public function destroyl($id){
        $lenguajeprograma= Lenguajeprograma::find($id);
        Lenguajeprograma::destroy($id);
        $this->msjdeletel();
    }

    public function destroyd($id){
        $descargaprograma= Descargaprograma::find($id);
        $descargaprograma::destroy($id);
        $this->msjdeleted();
    }

    public function default(){
        $this->nombrep = '';
        $this->descripcionp = '';
        $this->portadap = '';
        $this->portadap2 = '';
        $this->portadap3 = '';
        $this->estado='';
        $this->pcategoria_id='';
        $this->buscar = '';
        $this->identificador = rand();
        $this->identificador2 = rand();
        $this->urlp='';
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Programa registrado correctamente']);
    }
    public function msjexitol(){
        $this->dispatchBrowserEvent('alert',['message'=>'Lenguaje asociado correctamente']);
    }
    public function msjexitod(){
        $this->dispatchBrowserEvent('alert',['message'=>'Servidor asociado correctamente']);
    }

    public function msjexito2(){
        $this->dispatchBrowserEvent('alertasignar',['message'=>'Scrims registrados correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Programa editado correctamente']);
    }

    public function msjdelete(){
        $this->dispatchBrowserEvent('alert3',['message'=>'Scrim eliminado correctamente']);
    }
    public function msjdeletel(){
        $this->dispatchBrowserEvent('alert3',['message'=>'Lenguaje eliminado correctamente']);
    }
    public function msjdeleted(){
        $this->dispatchBrowserEvent('alert3',['message'=>'Servidor eliminado correctamente']);
    }
}
