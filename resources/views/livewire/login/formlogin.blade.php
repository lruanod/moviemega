

@if(empty(session('usuario_id')))
    <div class="row form-group">
        <label for="correo" class="col-5 text-white">Usuario</label>
        <input type="email" class="form-control col-md-5" wire:model.defer="correo">
        @error('correo') <span class="text-warning">{{$message}}</span> @enderror
    </div>

    <div class="row form-group">
        <label for="pass" class="col-5 text-white">Contraseña</label>
        <input type="password" class="form-control col-md-5" wire:model.lazy="pass" wire:change="change" >
        @error('pass') <span class="text-warning">{{$message}}</span> @enderror
    </div>

@endif

@if(!empty(session('usuario_id')))
    <div class="row form-group">
        <label for="correo" class="col-5 text-white">Usuario</label>
        <input type="text" class="form-control col-md-5" value="{{session('correo')}}" readonly="readonly" >
    </div>
@endif



