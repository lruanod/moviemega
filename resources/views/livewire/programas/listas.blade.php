

<div class="col-12 mt-2">
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Scrim
            </th>
            <th>
                Pelicula
            </th>

            <th>
                Acción
            </th>

        </tr>
        </thead>
        <tbody class="text-dark">
        @foreach($pscrims as $scrim)
            <tr>
                <td>
                    <img class="rounded" src="{{asset("storage/$scrim->urls")}}" alt="Generic placeholder image" width="120vw" height="90vh"  href="#">
                </td>
                <td>
                    {{$scrim->programa->nombre}}
                </td>

                <td>
                    <button type="button" class="btn btn-danger"   title="eliminar" wire:click="destroys({{$scrim->id}})" >
                        <i class="bi-trash text-white"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    {{$pscrims->links()}}
</div>
