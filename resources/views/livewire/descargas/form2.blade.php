
<div class="row form-group">
    <label for="servidord" class="col-5 text-white">Nombre del servidor de descarga</label>
    <input type="text" class="form-control col-md-5" wire:model.defer:="servidord">
    @error('servidord') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="url" class="col-5 text-white">Logo</label>
    <input type="file" class="form-control col-md-5" wire:model.defer="logod2" id="{{$identificador2}}">
    @error('logod2') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="card-body align-content-center">
    <div wire:loading wire:target="logod2" class="alert alert-danger">
        <ul>
            <li>Espere un momento hasta que la imagen se haya cargado</li>
        </ul>
    </div>

    @if ($logod2)
        <label  class="text-white align-content-center" >Pre visualización</label><br>
        <img class="rounded" src="{{$logod2->temporaryUrl()}}" width="250vw" height="150vh" >
        <br>
    @endif
    @if ($logod3)
        <label  class="text-white align-content-center" >Imagen actual</label><br>
        <img class="rounded" src="{{asset("storage/$logod3")}}" width="250vw" height="150vh" >
    @endif
</div> <br>




