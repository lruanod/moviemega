<div class="col-md-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #FA3404 , #FA9504  );" >
        <h4 class="text-center text-white">Servidores online</h4>
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
                            <label class="text-white">Nombre del servidor online</label><br>
                            <input type="text" placeholder="buscar"  wire:model="buscar" class="form-control col-md-6">
                    </div>


                    <div class="col-md-2">
                        <label  class="text-white">+ Servidor online</label><br>
                        <button type="button" class="btn btn-info col-md-5" data-toggle="modal" data-target="#addservidor" title="Agragar servidor">
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
                    <div class="col-md-2">
                        <label  class="text-white">+ Lenguajes</label><br>
                        <a  href="/lenguajes"type="submit" class="btn btn-info col-md-5" title="Agragar lenguajes">
                            <i class="bi-arrow-return-right"></i>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <label  class="text-white">+ Servidores de descarga</label><br>
                        <a  href="/descargas" type="submit" class="btn btn-info col-md-5" title="Agragar servidor">
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
        <h4 class="text-center text-white">Lista de servidores de descarga</h4>
    </div><br>
<div class="table-responsive text-white">
    <table class="table table-striped">
        <thead style="background: linear-gradient(to bottom, #959593   , #2C2B2A   );">
        <tr>
            <th>
                Nombre del servidor
            </th>

            <th>
                Logo
            </th>

            <th>
                Acción
            </th>

        </tr>
        </thead>
        <tbody>
        @foreach($servidors as $servidor)
            <tr>
                <td>
                    {{$servidor->nombres}}
                </td>
                <td>
                    <img class="rounded" src="{{asset("storage/$servidor->logos")}}" alt="Generic placeholder image" width="100vw" height="60vh"  href="#">
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editservidor" title="Editar servidor online" wire:click="edit({{$servidor->id}})" >
                        <i class="bi-pencil-fill text-white"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
    <br>
    {{$servidors->links()}}
</div>
