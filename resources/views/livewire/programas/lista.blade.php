<div class="col-md-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #FA3404 , #FA9504  );" >
        <h4 class="text-center text-white">Programas</h4>
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
                            <label for="buscar" class=" col-5 text-white">Nombre de la programa</label>
                            <input type="text" placeholder="buscar"  wire:model="buscar" class="form-control col-md-6">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label for="pacategoria_id" class="col-3 text-white" >Categoría</label>
                            <select class="form-control col-md-6" wire:model="pcategoria_id">
                                <option value="">Seleccionar Categoría</option>
                                @foreach($pcategorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->nombrepc}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="col-md-2">
                        <label  class="text-white">+ Programa</label><br>
                        <button type="button" class="btn btn-info col-md-5" data-toggle="modal" data-target="#addprograma" title="Agragar programa">
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
                        <label  class="text-white">+ Categorías</label><br>
                        <a  href="/pcategorias"type="submit" class="btn btn-info col-md-5" title="Agragar categorías">
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
        <h4 class="text-center text-white">Lista Programas</h4>
    </div><br>
<div class="table-responsive text-white">
    <table class="table table-striped table-sm "  >
        <thead style="background: linear-gradient(to bottom, #959593   , #2C2B2A   );">
        <tr>
            <th>
                Nombre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </th>
            <th>
                Descripción&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </th>
            <th>
                Portada
            </th>
            <th>
                Estado
            </th>
            <th>
                Categoría
            </th>
            <th>
                Acción
            </th>

        </tr>
        </thead>
        <tbody>
        @foreach($programas as $programa)
            <tr>
                <td>
                    {{$programa->nombrep}}
                </td>
                <td>
                      <span>{{$programa->descripcionp}}</span>
                </td>
                <td>
                    <img class="rounded" src="{{asset("storage/$programa->portadap")}}" alt="Generic placeholder image" width="80vw" height="100vh"  href="#">
                </td>
                <td>
                    {{$programa->estado}}
                </td>
                <td>
                    {{$programa->pcategoria->nombrepc}}
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editprograma" title="Editar programa" wire:click="edit({{$programa->id}})" >
                        <i class="bi-pencil-fill text-white"></i>
                    </button>
                    <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#addverlenguaje" title="Ver lenguajes" wire:click="bscrim({{$programa->id}})" >
                        <i class="bi bi-translate text-white"></i>
                    </button>
                    <button type="button" class="btn btn-dark"  data-toggle="modal" data-target="#addverdescarga" title="Ver servidores de descarga" wire:click="bscrim({{$programa->id}})" >
                        <i class="bi bi-upload text-white"></i>
                    </button>
                    <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#addverscrim" title="ver scrims" wire:click="bscrim({{$programa->id}})" >
                        <i class="bi-image-fill text-white"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
    <br>
    {{$programas->links()}}
</div>
