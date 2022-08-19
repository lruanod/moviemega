
<div class="row form-group">
    <label for="nombrel" class="col-5 text-white">Nombre de la categoría</label>
    <input type="text" class="form-control col-md-5" wire:model.defer:="nombrel">
    @error('nombrel') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="descripcionl" class="col-5 text-white">Descripción</label>
    <textarea class="form-control col-md-5" wire:model.defer="descripcionl"  rows="3"></textarea>
    @error('descripcionl') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="url" class="col-5 text-white">Bandera</label>
    <input type="file" class="form-control col-md-5" wire:model.defer="bandera" id="{{$identificador}}">
    @error('bandera') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="card-body align-content-center">
    <div wire:loading wire:target="bandera" class="alert alert-danger">
        <ul>
            <li>Espere un momento hasta que la imagen se haya cargado</li>
        </ul>
    </div>
    @if ($bandera)
        <label  class="text-white align-content-center" >Pre visualización</label><br>
        <img class="rounded" src="{{$bandera->temporaryUrl()}}" width="250vw" height="150vh" >
    @endif
</div> <br>




