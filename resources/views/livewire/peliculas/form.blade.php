
<div class="row form-group">
    <label for="nombre" class="col-5 text-white">Nombre</label>
    <input type="text" class="form-control col-md-5" wire:model.defer:="nombre">
    @error('nombre') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="sinopsis" class="col-5 text-white">Sinopsis</label>
    <textarea class="form-control col-md-5" wire:model.defer="sinopsis"  rows="6"></textarea>
    @error('sinopsis') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="calidad" class="col-5 text-white">Calidad</label>
    <input type="text" class="form-control col-md-5" wire:model.defer:="calidad">
    @error('calidad') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="festreno" class="col-5 text-white">Fecha de estreno</label>
    <input type="datetime-local" class="form-control col-md-5" wire:model.defer:="festreno">
    @error('festreno') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="trailer" class="col-5 text-white">Trailer</label>
    <input type="text" class="form-control col-md-5" wire:model.defer:="trailer">
    @error('trailer') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="portada" class="col-5 text-white">Portada</label>
    <input type="file" class="form-control col-md-5" wire:model.defer="portada" id="{{$identificador}}">
    @error('portada') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="estrella" class="col-5 text-white">Estrella</label>
    <input type="number" wire:model.defer="estrella" class="form-control col-md-5"  placeholder="0"  min="1" max="5">
    @error('estrella') <span class="text-warning">{{$message}}</span> @enderror
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
    <label for="categoria_id" class="col-5 text-white" >Categoría</label>
    <select class="form-control col-md-5" wire:model.defer="categoria_id">
        <option value="">Seleccionar Categoría</option>
        @foreach($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->nombrec}}</option>
        @endforeach
    </select>
    @error('categoria_id') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="card-body align-content-center">
    <div wire:loading wire:target="portada" class="alert alert-danger">
        <ul>
            <li>Espere un momento hasta que la imagen se haya cargado</li>
        </ul>
    </div>
    @if ($portada)
        <label  class="text-white align-content-center" >Pre visualización</label><br>
        <img class="rounded" src="{{$portada->temporaryUrl()}}" width="250vw" height="150vh" >
    @endif
</div> <br>




