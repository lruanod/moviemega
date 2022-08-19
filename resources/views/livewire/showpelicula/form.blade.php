
<div class="row form-group">
    <label for="usuario" class="col-5 text-white">E-mail / Nick</label>
    <input type="text" class="form-control col-md-5" wire:model="usuario">
    @error('usuario') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="descripcionc" class="col-5 text-white">Descripción</label>
    <textarea class="form-control col-md-5" wire:model.defer="descripcionc"  rows="6"></textarea>
    @error('descripcionc') <span class="text-warning">{{$message}}</span> @enderror
</div>





