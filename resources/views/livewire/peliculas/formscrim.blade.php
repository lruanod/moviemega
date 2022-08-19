

<div class="row form-group">
    <label for="urls" class="col-5 text-white">Scrims</label>
    <input type="file" class="form-control col-md-5" wire:model.defer="urls" id="{{$identificador4}}" multiple>
    @error('urls') <span class="text-warning">{{$message}}</span> @enderror
</div>



<div class="card-body align-content-center">
    <div wire:loading wire:target="urls" class="alert alert-danger">
        <ul>
            <li>Espere un momento hasta que la imagen se haya cargado</li>
        </ul>
    </div>
    @if ($urls)
        <label  class="text-white align-content-center" >Pre visualización</label><br>
        @foreach($urls as $key => $image)
            <img class="rounded" src="{{$image->temporaryUrl()}}" width="250vw" height="150vh" >
        @endforeach
    @endif
</div> <br>






