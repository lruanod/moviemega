<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Usuario;
use Livewire\Component;
use Livewire\WithPagination;

class UsuarioComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $usuario_id,$nombreu,$estado,$perfil,$correo,$pass;
    public $buscar;

    public function getUsuariosProperty(){
        $busqueda='%'.$this->buscar.'%';
        return Usuario::where('nombreu','like',$busqueda)->paginate(8,['*'],'usuario');
    }

    public function render()
    {
        return view('livewire.usuario-component',[
            'usuarios' => $this->getUsuariosProperty()
        ]);
    }
    public function store(){
        $this->validate([
            'nombreu'=> 'required|string|max:100',
            'correo'=> 'required|email|max:45|unique:usuarios',
            'pass'=> 'required|string|max:45',
            'estado'=> 'required|string|max:45',
            'perfil'=> 'required|string|max:45',
        ]);
        Usuario::create([
            'nombreu'=> $this->nombreu,
            'correo'=> $this->correo,
            'pass'=> $this->pass,
            'perfil'=> $this->perfil,
            'estado'=> $this->estado
        ]);
        $this->msjexito();
        $this->default();
    }

    public function edit($id){
        $usuario= Usuario::find($id);
        $this->usuario_id = $usuario->id;
        $this->nombreu = $usuario->nombreu;
        $this->correo = $usuario->correo;
        $this->pass = $usuario->pass;
        $this->perfil = $usuario->perfil;
        $this->estado = $usuario->estado;
    }

    public function update(){
        $this->validate([
            'nombreu'=> 'required|string|max:100',
            'correo'=> 'required|email|max:45',
            'pass'=> 'required|string|max:45',
            'estado'=> 'required|string|max:45',
            'perfil'=> 'required|string|max:45',
        ]);

        $usuario= Usuario::find($this->usuario_id);
        $usuario->update([
            'nombreu'=> $this->nombreu,
            'pass'=> $this->pass,
            'perfil'=> $this->perfil,
            'estado'=> $this->estado
        ]);
        $this->msjedit();
        $this->default();

    }


    public function default(){
        $this->nombreu = '';
        $this->correo='';
        $this->perfil='';
        $this->pass='';
        $this->estado = '';
        $this->buscar = '';
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Usuario registrado correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Usuario editado correctamente']);
    }
}
