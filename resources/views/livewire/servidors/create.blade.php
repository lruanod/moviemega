
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="addservidor" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="addservidor">Registrar servidor</h5>
                <button class="close col-md-1 btn btn-warning" data-dismiss="modal" aria-label="Close">
                   <i class="bi-backspace-reverse text-dark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-sm-10">
                    <div class="card" style="background: linear-gradient(to bottom, #FA3404 , #FA9504 );">
                        <div class="card-header text-center text-white">
                            crear servidor
                        </div>
                        <div class="card-body">
                            @include('livewire.servidors.form')
                            <br>
                            <div class="row form-group ">
                                <button wire:click="store" class="btn btn-info col-md-5">Registrar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- modal buscarcliente-->
