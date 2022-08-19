

<div class="row form-group">
    <label for="nombreprograma" class="col-5 text-white">Programa</label>
    <input type="text" class="form-control col-md-5" wire:model.defer:="nombreprograma" readonly="">
    @error('nombreprograma') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="urlp" class="col-5 text-white">Url de descarga</label>
    <input type="text" class="form-control col-md-5" wire:model.defer:="urlp" >
    @error('urlp') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="lenguajeprograma_id" class="col-5 text-white" >Lenguaje asociado</label>
    <select class="form-control col-md-5" wire:model.defer="lenguajeprograma_id">
        <option value="">Seleccionar Lenguaje</option>
        @foreach($lenguajeprogramas as $lenguajep)
            <option value="{{$lenguajep->id}}">{{$lenguajep->lenguaje->nombrel}}/{{$lenguajep->lenguaje->descripcionl}}</option>
        @endforeach
    </select>
    @error('lenguajeprograma_id') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="descarga_id" class="col-5 text-white" >Servidor de descarga</label>
    <select class="form-control col-md-5" wire:model.defer="descarga_id">
        <option value="">Seleccionar Servidor</option>
        @foreach($descargas as $descarga)
            <option value="{{$descarga->id}}">{{$descarga->servidord}}</option>
        @endforeach
    </select>
    @error('descarga_id') <span class="text-warning">{{$message}}</span> @enderror
</div>






