<div class="col-md-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #FA3404 , #FA9504  );" >
        <h4 class="text-center text-white">Categorías de programas</h4>
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
                    <div class="col-md-5">
                        <div class="row form-group">
                            <label for="buscar" class="text-white">Nombre de la categoría</label><br>
                            <input type="text" placeholder="buscar"  wire:model="buscar" class="form-control col-md-7">
                        </div>
                    </div>


                    <div class="col-md-2">
                        <label  class="text-white">+ categoría</label><br>
                        <button type="button" class="btn btn-info col-md-5" data-toggle="modal" data-target="#addcategoria" title="Agragar categoría">
                            <i class="bi-arrow-return-right"></i>
                        </button>
                    </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ programas</label><br>
                        <a  href="/programas" type="submit" class="btn btn-info col-md-5" title="Agragar programas">
                            <i class="bi-arrow-return-right"></i>
                        </a>
                    </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ Lenguajes</label><br>
                        <a  href="/lenguajes"type="submit" class="btn btn-info col-md-5" title="Agragar lenguajes">
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
        <h4 class="text-center text-white">Lista Categorías</h4>
    </div><br>
<div class="table-responsive text-white">
    <table class="table table-striped">
        <thead style="background: linear-gradient(to bottom, #959593   , #2C2B2A   );">
        <tr>
            <th>
                Nombre de la categoría
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
        @foreach($pcategorias as $categoria)
            <tr>
                <td>
                    {{$categoria->nombrepc}}
                </td>
                <td>
                    {{$categoria->estado}}
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editcategoria" title="Editar categoría" wire:click="edit({{$categoria->id}})" >
                        <i class="bi-pencil-fill text-white"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
    <br>
    {{$pcategorias->links()}}
</div>
