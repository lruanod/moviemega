<!-- modal agregar imagen-->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="addlenguaje" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="addlenguaje">Asignar lenguaje</h5>
                <button class="close col-md-1 btn btn-danger" data-dismiss="modal" aria-label="Close" >
                    <i class="bi-backspace-reverse text-dark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-sm-10">
                    <div class="card" style="background: linear-gradient(to bottom, #FA3404 , #FA9504 );">
                        <div class="card-header text-center text-white">
                            Adjuntar lenguaje
                        </div>
                        <div class="card-body">
                            @include('livewire.programas.formlenguaje')
                            <br>
                            <div class="row form-group ">
                                <button wire:click="addlenguaje" class="btn btn-danger col-md-5">Registrar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- modal agregar imagen-->
