

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
        @foreach($servidorpeliculas as $servidorpelicula)
            <tr>
                <td>
                    {{$servidorpelicula->urls}}<br>

                </td>
                <td>
                    {{$servidorpelicula->nombrel}}/{{$servidorpelicula->descripcionl}}<br>
                </td>
                <td>
                    <img class="rounded" src="{{asset("storage/".$servidorpelicula->bandera)}}" alt="Generic placeholder image" width="100vw" height="60vh"  href="#">
                </td>
                <td>
                    {{$servidorpelicula->nombres}}<br>
                </td>
                <td>
                    <img class="rounded" src="{{asset("storage/".$servidorpelicula->logos)}}" alt="Generic placeholder image" width="100vw" height="60vh"  href="#">
                </td>

                <td>
                    <button type="button" class="btn btn-danger"   title="eliminar" wire:click="destroyse({{$servidorpelicula->id}})" >
                        <i class="bi-trash text-white"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    {{$servidorpeliculas->links()}}
</div>
