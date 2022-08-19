<!-- form d_login-->
<div class="container col-md-6">
    <br><br>
    <div class="card mt-5" style="background: linear-gradient(to bottom, #FA3404 , #FA9504 );">
        <div class="card-header text-center text-white">
            Iniciar sesión
        </div>
        <div class="card-body">
            @include('livewire.login.formlogin')
            <br>
            <div class="row form-group ">
                @if(empty(session('usuario_id')))
                    <button wire:click="login" class="btn btn-danger col-md-5">Ingresar</button>
                @endif
                @if(!empty(session('usuario_id')))
                    <button wire:click="logout" class="btn btn-danger col-md-5">Cerrar sesion</button>
                @endif
            </div>
        </div>
    </div>
    <br><br>
</div>
<!-- form d_login-->
