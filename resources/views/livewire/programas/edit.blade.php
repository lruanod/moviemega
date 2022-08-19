
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="editprograma" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="editprograma">Editar programa</h5>
                <button wire:click="default" id="cerrar"  class="close col-md-1 btn btn-warning" data-dismiss="modal" aria-label="Close">
                    <i class="bi-backspace-reverse text-dark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-sm-10">
                    <div class="card" style="background: linear-gradient(to bottom, #FA3404 , #FA9504 );">
                        <div class="card-header text-center text-white">
                            Editar programa
                        </div>
                        <div class="card-body">
                            @include('livewire.programas.editform')
                            <br>
                            <div class="row form-group ">
                                <button wire:click="update" class="btn btn-danger col-md-5">Actualizar</button>
                            </div>
                            <br>
                            <div class="row form-group ">
                                <button wire:click="default" class="btn btn-danger col-md-5" data-dismiss="modal" aria-label="Close">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

