

<div class="row form-group">
    <label for="nombreprograma" class="col-5 text-white">Programa</label>
    <input type="text" class="form-control col-md-5" wire:model.defer:="nombreprograma" readonly="">
    @error('nombreprograma') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="lenguaje_id" class="col-5 text-white" >Lenguaje</label>
    <select class="form-control col-md-5" wire:model.defer="lenguaje_id">
        <option value="">Seleccionar Lenguaje</option>
        @foreach($lenguajes as $lenguaje)
            <option value="{{$lenguaje->id}}">{{$lenguaje->nombrel}}/{{$lenguaje->descripcionl}}</option>
        @endforeach
    </select>
    @error('lenguaje_id') <span class="text-warning">{{$message}}</span> @enderror
</div>






