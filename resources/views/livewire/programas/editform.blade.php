
<div class="row form-group">
    <label for="nombrep" class="col-5 text-white">Nombre</label>
    <input type="text" class="form-control col-md-5" wire:model.defer:="nombrep">
    @error('nombrep') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="descripcionp" class="col-5 text-white">Descripción</label>
    <textarea class="form-control col-md-5" wire:model.defer="descripcionp"  rows="6"></textarea>
    @error('descripcionp') <span class="text-warning">{{$message}}</span> @enderror
</div>


<div class="row form-group">
    <label for="portadap" class="col-5 text-white">Portada</label>
    <input type="file" class="form-control col-md-5" wire:model.defer="portadap2" id="{{$identificador2}}">
    @error('portadap2') <span class="text-warning">{{$message}}</span> @enderror
</div>


<div class="row form-group">
    <label for="" class="col-5 text-white" >Estado</label>
    <select class="form-control col-md-5" wire:model="estado">
        <option value="">Seleccionar Estado</option>
        <option value="Habilitado">Habilitado</option>
        <option value="Deshabilitado">Deshabilitado</option>
    </select>
    @error('estado') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="pcategoria_id" class="col-5 text-white" >Categoría</label>
    <select class="form-control col-md-5" wire:model.defer="pcategoria_id">
        <option value="">Seleccionar Categoría</option>
        @foreach($pcategorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->nombrepc}}</option>
        @endforeach
    </select>
    @error('pcategoria_id') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="card-body align-content-center">
    <div wire:loading wire:target="portadap2" class="alert alert-danger">
        <ul>
            <li>Espere un momento hasta que la imagen se haya cargado</li>
        </ul>
    </div>

    @if ($portadap2)
        <label  class="text-white align-content-center" >Pre visualización</label><br>
        <img class="rounded" src="{{$portadap2->temporaryUrl()}}" width="250vw" height="150vh" >
        <br>
    @endif
    @if ($portadap3)
        <label  class="text-white align-content-center" >Imagen actual</label><br>
        <img class="rounded" src="{{asset("storage/$portadap3")}}" width="250vw" height="150vh" >
    @endif
</div> <br>




