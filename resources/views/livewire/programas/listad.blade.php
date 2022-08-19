

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
        @foreach($descargaprogramas as $descargaprograma)
            <tr>
                <td>
                    {{$descargaprograma->urlp}}<br>

                </td>
                <td>
                    {{$descargaprograma->nombrel}}/{{$descargaprograma->descripcionl}}<br>
                </td>
                <td>
                    <img class="rounded" src="{{asset("storage/".$descargaprograma->bandera)}}" alt="Generic placeholder image" width="100vw" height="60vh"  href="#">
                </td>
                <td>
                    {{$descargaprograma->servidord}}<br>
                </td>
                <td>
                    <img class="rounded" src="{{asset("storage/".$descargaprograma->logod)}}" alt="Generic placeholder image" width="100vw" height="60vh"  href="#">
                </td>

                <td>
                    <button type="button" class="btn btn-danger"   title="eliminar" wire:click="destroyd({{$descargaprograma->id}})" >
                        <i class="bi-trash text-white"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    {{$descargaprogramas->links()}}
</div>
