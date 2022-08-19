
<div class="row form-group">
    <label for="nombreu" class="col-5 text-white">Nombre</label>
    <input type="text" class="form-control col-md-5" wire:model="nombreu">
    @error('nombreu') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="correo" class="col-5 text-white">E-mail</label>
    <input type="email" class="form-control col-md-5" wire:model="correo">
    @error('correo') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="pass" class="col-5 text-white">Contraseña</label>
    <input type="text" class="form-control col-md-5" wire:model="pass">
    @error('pass') <span class="text-warning">{{$message}}</span> @enderror
</div>


<div class="row form-group">
    <label for="perfil" class="col-5 text-white" >Perfil</label>
    <select class="form-control col-md-5" wire:model="perfil">
        <option value="">Seleccionar Perfil</option>
        <option value="Administrador">Administración</option>
        <option value="Operador">Operador</option>
    </select>
    @error('perfil') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="estado" class="col-5 text-white" >Estado</label>
    <select class="form-control col-md-5" wire:model="estado">
        <option value="">Seleccionar Estado</option>
        <option value="Habilitado">Habilitado</option>
        <option value="Deshabilitado">Deshabilitado</option>
    </select>
    @error('estado') <span class="text-warning">{{$message}}</span> @enderror
</div>





