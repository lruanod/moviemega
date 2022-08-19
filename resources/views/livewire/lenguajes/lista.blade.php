<div class="col-md-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #FA3404 , #FA9504  );" >
        <h4 class="text-center text-white">Lenguajes</h4>
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
                            <label class="text-white">Nombre del Lenguaje</label><br>
                            <input type="text" placeholder="buscar"  wire:model="buscar" class="form-control col-md-6">
                    </div>


                    <div class="col-md-2">
                        <label  class="text-white">+ Lenguaje</label><br>
                        <button type="button" class="btn btn-info col-md-5" data-toggle="modal" data-target="#addlenguaje" title="Agragar lenguaje">
                            <i class="bi-arrow-return-right"></i>
                        </button>
                    </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ películas</label><br>
                        <a  href="/movies" type="submit" class="btn btn-info col-md-5" title="Agragar películas">
                            <i class="bi-arrow-return-right"></i>
                        </a>
                    </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ Categorías</label><br>
                        <a  href="/categorias"type="submit" class="btn btn-info col-md-5" title="Agragar categorías">
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
        <h4 class="text-center text-white">Lista Leguajes</h4>
    </div><br>
<div class="table-responsive text-white">
    <table class="table table-striped">
        <thead style="background: linear-gradient(to bottom, #959593   , #2C2B2A   );">
        <tr>
            <th>
                Nombre del lenguaje
            </th>
            <th>
                Descripción
            </th>

            <th>
                Bandera
            </th>

            <th>
                Acción
            </th>

        </tr>
        </thead>
        <tbody>
        @foreach($lenguajes as $lenguaje)
            <tr>
                <td>
                    {{$lenguaje->nombrel}}
                </td>
                <td>
                    {{$lenguaje->descripcionl}}
                </td>
                <td>
                    <img class="rounded" src="{{asset("storage/$lenguaje->bandera")}}" alt="Generic placeholder image" width="100vw" height="60vh"  href="#">
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editlenguaje" title="Editar lenguaje" wire:click="edit({{$lenguaje->id}})" >
                        <i class="bi-pencil-fill text-white"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
    <br>
    {{$lenguajes->links()}}
</div>
