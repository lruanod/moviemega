

<div class="col-12 mt-2">
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Lenguaje
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
        <tbody class="text-dark">
        @foreach($lenguajepeliculas as $lenguajepelicula)
            <tr>
                <td>
                    {{$lenguajepelicula->lenguaje->nombrel}}<br>

                </td>
                <td>
                    {{$lenguajepelicula->lenguaje->descripcionl}}<br>
                </td>
                <td>
                    <img class="rounded" src="{{asset("storage/".$lenguajepelicula->lenguaje->bandera)}}" alt="Generic placeholder image" width="100vw" height="60vh"  href="#">
                </td>

                <td>
                    <button type="button" class="btn btn-danger"   title="eliminar" wire:click="destroyl({{$lenguajepelicula->id}})" >
                        <i class="bi-trash text-white"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    {{$lenguajepeliculas->links()}}
</div>
