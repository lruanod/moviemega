
<div class="row form-group">
    <label for="nombrel" class="col-5 text-white">Nombre de la categoría</label>
    <input type="text" class="form-control col-md-5" wire:model="nombrel">
    @error('nombrel') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="descripcionl" class="col-5 text-white">Descripción</label>
    <textarea class="form-control col-md-5" wire:model.defer="descripcionl"  rows="3"></textarea>
    @error('descripcionl') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="url" class="col-5 text-white">Bandera</label>
    <input type="file" class="form-control col-md-5" wire:model.defer="bandera2" id="{{$identificador2}}">
    @error('bandera2') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="card-body align-content-center">
    <div wire:loading wire:target="bandera2" class="alert alert-danger">
        <ul>
            <li>Espere un momento hasta que la imagen se haya cargado</li>
        </ul>
    </div>

    @if ($bandera2)
        <label  class="text-white align-content-center" >Pre visualización</label><br>
        <img class="rounded" src="{{$bandera2->temporaryUrl()}}" width="250vw" height="150vh" >
        <br>
    @endif
    @if ($bandera3)
        <label  class="text-white align-content-center" >Imagen actual</label><br>
        <img class="rounded" src="{{asset("storage/$bandera3")}}" width="250vw" height="150vh" >
    @endif
</div> <br>




