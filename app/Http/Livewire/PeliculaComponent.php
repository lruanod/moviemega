<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Descarga;
use App\Models\Descargapelicula;
use App\Models\Descargaprograma;
use App\Models\Lenguaje;
use App\Models\Lenguajepelicula;
use App\Models\Pelicula;
use App\Models\Scrim;
use App\Models\Servidor;
use App\Models\Servidorpelicula;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
Use Storage;


class PeliculaComponent extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme ="bootstrap";
    public $pelicula_id,$nombre,$sinopsis,$calidad,$festreno,$trailer,$portada,$portada2,$portada3,$estrella,$estado,$categoria_id, $identificador,$identificador2;
    public $lenguaje_id, $lenguajepelicula_id,$nombrepelicula;
    public $urld, $descarga_id;
    public $urlss, $servidor_id;
    public $urls=[],$urls2,$urls3,$scrim_id,$identificador3,$identificador4;

    public $buscar;

    public function  mount(){
        $this->identificador = rand();
        $this->identificador2 = rand();
        $this->identificador3 = rand();
        $this->identificador4 = rand();
        $this->categoria_id='';
    }
    public function getPeliculasProperty(){
        $busqueda='%'.$this->buscar.'%';
        if(!empty($this->categoria_id)){
            return Pelicula::where('categoria_id','=',$this->categoria_id)->orderBy('id', 'DESC')->paginate(8,['*'],'peliculas2');
        }
        else {
            return Pelicula::where('nombre','like',$busqueda)->orwhere('sinopsis','like',$busqueda)->orderBy('id', 'DESC')->paginate(8,['*'],'peliculas2');
        }
    }
    public function render()
    {
        return view('livewire.pelicula-component',[
            'peliculas' => $this->getPeliculasProperty(),
            'categorias'=> Categoria::where('estado','=','Habilitado')->get(),
            'lenguajes' => Lenguaje::all(),
            'descargas' => Descarga::all(),
            'servidors' => Servidor::all(),
            'descargapeliculas'=> Descargapelicula::join('lenguajepeliculas','descargapeliculas.lenguajepelicula_id','lenguajepeliculas.id')->join('descargas','descargapeliculas.descarga_id','descargas.id')->join('lenguajes','lenguajepeliculas.lenguaje_id','lenguajes.id')->where('lenguajepeliculas.pelicula_id','=',$this->pelicula_id)->orderBy('descargapeliculas.id', 'DESC')->select('descargapeliculas.id','descargapeliculas.urld','descargas.id as descarga_id','descargas.servidord','descargas.logod','lenguajes.id as len_id','lenguajes.nombrel','lenguajes.bandera','lenguajes.descripcionl')->paginate(8,['*'],'descargap'),
            'servidorpeliculas'=> Servidorpelicula::join('lenguajepeliculas','servidorpeliculas.lenguajepelicula_id','lenguajepeliculas.id')->join('servidors','servidorpeliculas.servidor_id','servidors.id')->join('lenguajes','lenguajepeliculas.lenguaje_id','lenguajes.id')->where('lenguajepeliculas.pelicula_id','=',$this->pelicula_id)->orderBy('servidorpeliculas.id', 'DESC')->select('servidorpeliculas.id','servidorpeliculas.urls','servidors.id as servidor_id','servidors.nombres','servidors.logos','lenguajes.id as len_id','lenguajes.nombrel','lenguajes.bandera','lenguajes.descripcionl')->paginate(8,['*'],'servidorp'),
            'lenguajepeliculas' => Lenguajepelicula::where('pelicula_id','=',$this->pelicula_id)->orderBy('id', 'DESC')->paginate(8,['*'],'lengup'),
            'scrims' => Scrim::where('pelicula_id','=',$this->pelicula_id)->orderBy('id', 'DESC')->paginate(8,['*'],'scri ')
        ]);
    }
    public function store(){
        $this->validate([
            'nombre'=> 'required|string|max:100',
            'sinopsis'=> 'required|string|max:5000',
            'calidad'=> 'required|string|max:75',
            'festreno'=> 'required|date',
            'trailer'=> 'required|string|max:200',
            'portada'=> 'required|image|max:2048',
            'estrella'=> 'required|integer|min:1|max:5',
            'estado'=> 'required|string|max:45',
            'categoria_id'=> 'required|integer'

        ]);

        /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
        $image= $this->portada->store('portadas','public');
        /*fin*/
        Pelicula::create([
            'nombre'=> $this->nombre,
            'sinopsis'=> $this->sinopsis,
            'calidad'=> $this->calidad,
            'festreno'=> $this->festreno,
            'trailer'=> $this->trailer,
            'portada'=> $image,
            'estrella' => $this->estrella,
            'estado'=> $this->estado,
            'categoria_id'=> $this->categoria_id
        ]);
        $this->msjexito();
        $this->default();
    }

    public function edit($id){
        $pelicula= Pelicula::find($id);
        $this->pelicula_id = $pelicula->id;
        $this->nombre = $pelicula->nombre;
        $this->sinopsis = $pelicula->sinopsis;
        $this->calidad = $pelicula->calidad;
        $this->festreno = $pelicula->festreno;
        $this->trailer = $pelicula->trailer;
        $this->portada3 = $pelicula->portada;
        $this->estrella = $pelicula->estrella;
        $this->estado = $pelicula->estado;
        $this->categoria_id = $pelicula->categoria_id;
    }

    public function update(){
        $this->validate([
            'nombre'=> 'required|string|max:100',
            'sinopsis'=> 'required|string|max:5000',
            'calidad'=> 'required|string|max:75',
            'festreno'=> 'required|date',
            'trailer'=> 'required|string|max:200',
            'estrella'=> 'required|integer|min:1|max:5',
            'estado'=> 'required|string|max:45',
            'categoria_id'=> 'required|integer'
        ]);
        $pelicula= Pelicula::find($this->pelicula_id);
        if(!empty($this->portada2)){
            // eliminar archivo existente
            Storage::disk('public')->delete($pelicula->portada);
            //eliminar
            /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
            $image= $this->portada2->store('portadas','public');
            /*fin*/
            $pelicula->update([
                'nombre'=> $this->nombre,
                'sinopsis'=> $this->sinopsis,
                'calidad'=> $this->calidad,
                'festreno'=> $this->festreno,
                'trailer'=> $this->trailer,
                'portada'=> $image,
                'estrella' => $this->estrella,
                'estado'=> $this->estado,
                'categoria_id'=> $this->categoria_id
            ]);
        } else{
            $pelicula->update([
                'nombre'=> $this->nombre,
                'sinopsis'=> $this->sinopsis,
                'calidad'=> $this->calidad,
                'festreno'=> $this->festreno,
                'trailer'=> $this->trailer,
                'estrella' => $this->estrella,
                'estado'=> $this->estado,
                'categoria_id'=> $this->categoria_id
            ]);
        }

        $this->msjedit();
        $this->default();
    }

    public  function addlenguaje(){
        $this->validate([
            'pelicula_id'=> 'required|integer',
            'lenguaje_id'=> 'required|integer'
        ]);

        Lenguajepelicula::create([
            'pelicula_id'=> $this->pelicula_id,
            'lenguaje_id'=> $this->lenguaje_id
        ]);
        $this->msjexitol();
        $this->default();

    }
    public  function adddescarga(){
        $this->validate([
            'urld'=> 'required|string|max:150',
            'lenguajepelicula_id'=> 'required|integer',
            'descarga_id'=> 'required|integer'
        ]);

        Descargapelicula::create([
            'urld'=> $this->urld,
            'lenguajepelicula_id'=> $this->lenguajepelicula_id,
            'descarga_id'=> $this->descarga_id
        ]);
        $this->msjexitod();
        $this->default();

    }
    public  function addservidor(){
        $this->validate([
            'urlss'=> 'required|string|max:150',
            'lenguajepelicula_id'=> 'required|integer',
            'servidor_id'=> 'required|integer'
        ]);

        Servidorpelicula::create([
            'urls'=> $this->urlss,
            'lenguajepelicula_id'=> $this->lenguajepelicula_id,
            'servidor_id'=> $this->servidor_id
        ]);
        $this->msjexitod();
        $this->default();

    }
    public  function bscrim($id){
        // buscar id de pelicula
        $pelicula=pelicula::find($id);
        $this->pelicula_id=$pelicula->id;
        $this->nombrepelicula=$pelicula->nombre;
    }
    public function addscrim(){
        $this->validate([
            'urls.*'=> 'required|image|max:2048',
            'pelicula_id'=> 'required|integer'
        ]);
        foreach ($this->urls as $key => $image){
            /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
            // $image= $this->url->store('portadas','public');
            $image= $this->urls[$key]->store('scrims','public');
            /*fin*/
            // registrar url de imagen con su respectivo id de entrada
            Scrim::create([
                'urls'=> $image,
                'pelicula_id'=> $this->pelicula_id
            ]);
        }
        $this->msjexito2();
        $this->default();
    }

    public function destroys($id){
        $scrim= Scrim::find($id);
        // eliminar archivo existente
        Storage::disk('public')->delete($scrim->urls);
        //eliminar
        Scrim::destroy($id);
        $this->msjdelete();
    }

    public function destroyl($id){
        $lenguajepelicula= Lenguajepelicula::find($id);
        Lenguajepelicula::destroy($id);
        $this->msjdeletel();
    }

    public function destroyd($id){
        $descargapelicula= Descargapelicula::find($id);
        Descargapelicula::destroy($id);
        $this->msjdeleted();
    }

    public function destroyse($id){
        $servidorpelicula= Servidorpelicula::find($id);
        Servidorpelicula::destroy($id);
        $this->msjdeleted();
    }

    public function default(){
        $this->nombre = '';
        $this->sinopsis = '';
        $this->calidad='';
        $this->festreno='';
        $this->trailer='';
        $this->portada = '';
        $this->portada2 = '';
        $this->portada3 = '';
        $this->estrella='';
        $this->estado='';
        $this->categoria_id='';
        $this->buscar = '';
        $this->identificador = rand();
        $this->identificador2 = rand();
        $this->identificador3=rand();
        $this->identificador4=rand();
        $this->urld='';
        $this->urlss='';

    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Pelicula registrada correctamente']);
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
        $this->dispatchBrowserEvent('alert2',['message'=>'Pelicula editada correctamente']);
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
