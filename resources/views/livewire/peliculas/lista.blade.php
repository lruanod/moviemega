<div class="col-md-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #FA3404 , #FA9504  );" >
        <h4 class="text-center text-white">Peliculas</h4>
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
                            <label for="buscar" class=" col-5 text-white">Nombre de la pelucula</label>
                            <input type="text" placeholder="buscar"  wire:model="buscar" class="form-control col-md-6">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label for="" class="col-3 text-white" >Categoría</label>
                            <select class="form-control col-md-6" wire:model="categoria_id">
                                <option value="">Seleccionar Categoría</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->nombrec}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="col-md-2">
                        <label  class="text-white">+ Pelicula</label><br>
                        <button type="button" class="btn btn-info col-md-5" data-toggle="modal" data-target="#addpelicula" title="Agragar pelicula">
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


                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12  mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #FA3404 , #FA9504 );" >
        <h4 class="text-center text-white">Lista Peliculas</h4>
    </div><br>
<div class="table-responsive text-white">
    <table class="table table-striped table-sm "  >
        <thead style="background: linear-gradient(to bottom, #959593   , #2C2B2A   );">
        <tr>
            <th>
                Acción
            </th>
            <th>
                Fecha de estreno
            </th>
            <th>
                Nombre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </th>
            <th>
                Sinopsis&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </th>
            <th>
                Calidad
            </th>
            <th>
                Trailer
            </th>
            <th>
                Portada
            </th>
            <th>
                Estrellas
            </th>
            <th>
                Estado
            </th>
            <th>
                Categoría
            </th>


        </tr>
        </thead>
        <tbody>
        @foreach($peliculas as $pelicula)
            <tr>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editpelicula" title="Editar pelicula" wire:click="edit({{$pelicula->id}})" >
                        <i class="bi-pencil-fill text-white"></i>
                    </button>
                    <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#addverlenguaje" title="Ver lenguajes" wire:click="bscrim({{$pelicula->id}})" >
                        <i class="bi bi-translate text-white"></i>
                    </button>
                    <button type="button" class="btn btn-dark"  data-toggle="modal" data-target="#addverdescarga" title="Ver servidores de descarga" wire:click="bscrim({{$pelicula->id}})" >
                        <i class="bi bi-upload text-white"></i>
                    </button>
                    <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#addverservidor" title="Ver servidores online" wire:click="bscrim({{$pelicula->id}})" >
                        <i class="bi bi-server text-white"></i>
                    </button>

                    <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#addverscrim" title="ver scrims" wire:click="bscrim({{$pelicula->id}})" >
                        <i class="bi-image-fill text-white"></i>
                    </button>
                </td>
                <td>
                    {{\carbon\carbon::parse($pelicula->festreno)->format('d/m/Y')}}
                </td>
                <td>
                    {{$pelicula->nombre}}
                </td>
                <td>
                      <span>{{$pelicula->sinopsis}}</span>
                </td>

                <td>
                    {{$pelicula->calidad}}
                </td>
                <td>
                    <div class="embed-responsive" style="width: 20vw; height: 55vh; ">
                        <x-embed url="{{$pelicula->trailer}}"/>
                    </div>

                </td>
                <td>
                    <img class="rounded" src="{{asset("storage/$pelicula->portada")}}" alt="Generic placeholder image" width="80vw" height="100vh"  href="#">
                </td>
                <td>
                    <div class="text-warning text-center">
                        <font size="4">
                            @if($pelicula->estrella==5)
                                ★ ★ ★ ★ ★
                            @endif
                            @if($pelicula->estrella==4)
                                ★ ★ ★ ★
                            @endif
                            @if($pelicula->estrella==3)
                                ★ ★ ★
                            @endif
                            @if($pelicula->estrella==2)
                                ★ ★
                            @endif
                            @if($pelicula->estrella==1)
                                ★
                            @endif
                        </font>
                    </div>

                </td>
                <td>
                    {{$pelicula->estado}}
                </td>
                <td>
                    {{$pelicula->categoria->nombrec}}
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>
    <br>
    {{$peliculas->links()}}
</div>
