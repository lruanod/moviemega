
<div class="row form-group">
    <label for="servidord" class="col-5 text-white">Nombre del servidor de descarga</label>
    <input type="text" class="form-control col-md-5" wire:model.defer:="servidord">
    @error('servidord') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="url" class="col-5 text-white">Logo</label>
    <input type="file" class="form-control col-md-5" wire:model.defer="logod" id="{{$identificador}}">
    @error('logod') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="card-body align-content-center">
    <div wire:loading wire:target="logod" class="alert alert-danger">
        <ul>
            <li>Espere un momento hasta que la imagen se haya cargado</li>
        </ul>
    </div>
    @if ($logod)
        <label  class="text-white align-content-center" >Pre visualización</label><br>
        <img class="rounded" src="{{$logod->temporaryUrl()}}" width="250vw" height="150vh" >
    @endif
</div> <br>




