

<div class="row form-group">
    <label for="nombrepelicular" class="col-5 text-white">Pelicula</label>
    <input type="text" class="form-control col-md-5" wire:model.defer:="nombrepelicula" readonly="">
    @error('nombrepelicula') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="urlss" class="col-5 text-white">Url de descarga</label>
    <input type="text" class="form-control col-md-5" wire:model.defer:="urlss" >
    @error('urlss') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="lenguajepelicula_id" class="col-5 text-white" >Lenguaje asociado</label>
    <select class="form-control col-md-5" wire:model.defer="lenguajepelicula_id">
        <option value="">Seleccionar Lenguaje</option>
        @foreach($lenguajepeliculas as $lenguajep)
            <option value="{{$lenguajep->id}}">{{$lenguajep->lenguaje->nombrel}}/{{$lenguajep->lenguaje->descripcionl}}</option>
        @endforeach
    </select>
    @error('lenguajepelicula_id') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="servidor_id" class="col-5 text-white" >Servidor de descarga</label>
    <select class="form-control col-md-5" wire:model.defer="servidor_id">
        <option value="">Seleccionar Servidor</option>
        @foreach($servidors as $servidor)
            <option value="{{$servidor->id}}">{{$servidor->nombres}}</option>
        @endforeach
    </select>
    @error('servidor_id') <span class="text-warning">{{$message}}</span> @enderror
</div>






