
<div class="row form-group">
    <label for="nombres" class="col-5 text-white">Nombre del servidor online</label>
    <input type="text" class="form-control col-md-5" wire:model.defer:="nombres">
    @error('nombres') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="url" class="col-5 text-white">Logo</label>
    <input type="file" class="form-control col-md-5" wire:model.defer="logos" id="{{$identificador}}">
    @error('logos') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="card-body align-content-center">
    <div wire:loading wire:target="logos" class="alert alert-danger">
        <ul>
            <li>Espere un momento hasta que la imagen se haya cargado</li>
        </ul>
    </div>
    @if ($logos)
        <label  class="text-white align-content-center" >Pre visualización</label><br>
        <img class="rounded" src="{{$logos->temporaryUrl()}}" width="250vw" height="150vh" >
    @endif
</div> <br>




