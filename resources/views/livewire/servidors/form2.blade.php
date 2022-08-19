
<div class="row form-group">
    <label for="nombres" class="col-5 text-white">Nombre del servidor online</label>
    <input type="text" class="form-control col-md-5" wire:model.defer:="nombres">
    @error('nombres') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="logos2" class="col-5 text-white">Logo</label>
    <input type="file" class="form-control col-md-5" wire:model.defer="logos2" id="{{$identificador2}}">
    @error('logos2') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="card-body align-content-center">
    <div wire:loading wire:target="logos2" class="alert alert-danger">
        <ul>
            <li>Espere un momento hasta que la imagen se haya cargado</li>
        </ul>
    </div>

    @if ($logos2)
        <label  class="text-white align-content-center" >Pre visualización</label><br>
        <img class="rounded" src="{{$logos2->temporaryUrl()}}" width="250vw" height="150vh" >
        <br>
    @endif
    @if ($logos3)
        <label  class="text-white align-content-center" >Imagen actual</label><br>
        <img class="rounded" src="{{asset("storage/$logos3")}}" width="250vw" height="150vh" >
    @endif
</div> <br>




