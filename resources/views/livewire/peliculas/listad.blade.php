

<div class="col-12 mt-2">
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Url
            </th>
            <th>
                Lenguaje
            </th>
            <th>
                Bandera
            </th>
            <th>
                Servidor
            </th>
            <th>
                Logo
            </th>
            <th>
                Acción
            </th>

        </tr>
        </thead>
        <tbody class="text-dark">
        @foreach($descargapeliculas as $descargapelicula)
            <tr>
                <td>
                    {{$descargapelicula->urld}}<br>

                </td>
                <td>
                    {{$descargapelicula->nombrel}}/{{$descargapelicula->descripcionl}}<br>
                </td>
                <td>
                    <img class="rounded" src="{{asset("storage/".$descargapelicula->bandera)}}" alt="Generic placeholder image" width="100vw" height="60vh"  href="#">
                </td>
                <td>
                    {{$descargapelicula->servidord}}<br>
                </td>
                <td>
                    <img class="rounded" src="{{asset("storage/".$descargapelicula->logod)}}" alt="Generic placeholder image" width="100vw" height="60vh"  href="#">
                </td>

                <td>
                    <button type="button" class="btn btn-danger"   title="eliminar" wire:click="destroyd({{$descargapelicula->id}})" >
                        <i class="bi-trash text-white"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    {{$descargapeliculas->links()}}
</div>
