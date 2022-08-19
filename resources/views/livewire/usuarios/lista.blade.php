<div class="col-md-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #FA3404 , #FA9504  );" >
        <h4 class="text-center text-white">Usuarios</h4>
    </div>
</div>

<div class="col-md-10 mt-3">
    <div class="align-content-center">
        <div class="card" style="background: linear-gradient(to bottom, #FA3404 , #FA9504   );">
            <div class="card-header text-center text-white">
                Busqueda
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label for="buscar" class="text-white col-3">Nombre</label>
                            <input type="text" placeholder="buscar"  wire:model="buscar" class="form-control col-md-6">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ usuarios</label><br>
                        <button type="button" class="btn btn-info col-md-5" data-toggle="modal" data-target="#addusuario" title="Agragar usuario">
                            <i class="bi-arrow-return-right"></i>
                        </button>
                    </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ películas</label><br>
                        <a  href="/peliculas" type="submit" class="btn btn-info col-md-5" title="Agragar películas">
                            <i class="bi-arrow-return-right"></i>
                        </a>
                    </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ Lenguajes</label><br>
                        <a  href="/lenguajes"type="submit" class="btn btn-info col-md-5" title="Agragar lenguajes">
                            <i class="bi-arrow-return-right"></i>
                        </a>
                    </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ catagorias</label><br>
                        <a  href="/categorias" type="submit" class="btn btn-info col-md-5" title="Agragar categorias">
                            <i class="bi-arrow-return-right"></i>
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12  mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #FA3404 , #FA9504 );" >
        <h4 class="text-center text-white">Lista Usuarios</h4>
    </div><br>
<div class="table-responsive text-white">
    <table class="table table-striped">
        <thead style="background: linear-gradient(to bottom, #959593   , #2C2B2A   );">
        <tr>
            <th>
                Nombre
            </th>
            <th>
                E-mail
            </th>
            <th>
                Perfil
            </th>
            <th>
                Estado
            </th>

            <th>
                Acción
            </th>

        </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <td>
                    {{$usuario->nombreu}}
                </td>
                <td>
                    {{$usuario->correo}}
                </td>
                <td>
                    {{$usuario->perfil}}
                </td>
                <td>
                    {{$usuario->estado}}
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editusuario" title="Editar usuario" wire:click="edit({{$usuario->id}})" >
                        <i class="bi-pencil-fill text-white"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
    <br>
    {{$usuarios->links()}}
</div>
