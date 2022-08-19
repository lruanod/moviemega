<!-- modal addpedido-->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="addverdescarga" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  text-dark" id="addverdescarga">Asociar descarga</h5> &nbsp;
                <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#adddescarga" title="Agregar servidor de descarga" >
                    <i class="bi-plus text-white"></i>
                </button>
                <button class="close col-md-1 btn btn-warning" data-dismiss="modal" aria-label="Close">
                    <i class="bi-backspace-reverse text-dark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-sm-12">
                    @include('livewire.programas.listad')
                </div>

            </div>
        </div>
    </div>
</div>

<!-- modal buscarpedido-->
