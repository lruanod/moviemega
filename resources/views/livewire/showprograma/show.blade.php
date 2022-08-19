<div class="row">
    @foreach($programas as $programa)
    <div class="col-lg-12 text-white text-center">

        <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded"> 	<h1 class="p-3 mb-2 ">{{$programa->nombrep}} </h1>

        </div>
        <br>

        <div class="container bg-dark text-warning rounded"><br>
            <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
                <h5 class="p-2 mb-1 text-white">Descripción y requisitos</h5>
            </div>
            {{$programa->descripcionp}}<br><br>

        </div><br>


        <div class="container bg-dark text-warning rounded"><br>
            <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
                <h5 class="p-2 mb-1 text-white">Fecha</h5>
            </div>
            {{\carbon\carbon::parse($programa->created_at)->format('d/m/Y')}}<br><br>
        </div><br>

        <div class="container bg-dark text-warning rounded"><br>
            <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
                <h5 class="p-2 mb-1 text-white">Idioma</h5>
            </div><br>

            @foreach($lenguajeprogramas as $lenguajeprograma)
                <img class="rounded" src="{{asset("storage/".$lenguajeprograma->lenguaje->bandera)}}" alt="Generic placeholder image" width="100vw" height="60vh"  href="#"><br>
                Idioma:&nbsp;{{$lenguajeprograma->lenguaje->nombrel}}&nbsp;/{{$lenguajeprograma->lenguaje->descripcionl}}<br>

            @endforeach

            <br><br>

            <br>
        </div><br>

        <div class="container bg-dark text-warning rounded"><br>
            <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
                <h5 class="p-2 mb-1 text-white">Capturas</h5>
            </div><br>

            @foreach($scrims as $scrim)
                <img class="rounded" src="{{asset("storage/".$scrim->urls)}}" alt="Generic placeholder image" width="600vw" height="400vh"  href="#"><br>
                <br><br>
            @endforeach

        </div><br>


        <div class="container bg-dark text-warning rounded"><br>
            <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
                <h5 class="p-2 mb-1 text-white">Descargas</h5>
            </div> <br>

            @foreach($descargaprogramas as $descargas)
                <img class="rounded" src="{{asset("storage/".$descargas->logod)}}" alt="Generic placeholder image" width="100vw" height="60vh"  href="#"><br>
                    Servidor: {{$descargas->servidord}}/{{$descargas->nombrel}}/{{$descargas->descripcionl}}<br>
                   <a class="btn btn-outline-warning" href="/showpdescarga/{{$descargas->id}}">Descarga</a><br><br>
            @endforeach
            <br>
        </div><br>


        <div class="container bg-dark text-warning rounded"><br>
            <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
                <h5 class="p-2 mb-1 text-white">Comentarios
                    <button type="button"  class="btn btn-info"  data-toggle="modal" data-target="#addcomentario">Insertar comentario</button>
                </h5>
            </div>
            <br>
            @foreach($comentarios as $comentario)

                <div class="card-body bg-dark" style="border: orangered 5px outset;">
                    <div class="row form-group">
                        <label for="" class="col-2">Fecha</label>

                        <input type="text" name="fecha"   value="{{\carbon\carbon::parse($comentario->created_at)->format(' d/m/Y H:i:s')}}" class="form-control col-md-9"  readonly="readonly">
                    </div>
                    <div class="row form-group">
                        <label for="" class="col-2">Usuario</label>
                        <input type="text" name="usuario"   value="{{$comentario->usuariopc}}" class="form-control col-md-9"  readonly="readonly">
                    </div>
                    <div class="row form-group">
                        <label for="" class="col-2">Comentario</label>
                        <textarea name="descripcion" class="form-control col-md-9" rows="2" cols="9" readonly="readonly">{{$comentario->descripcionpc}}</textarea>
                    </div>
                </div>
                <br>

            @endforeach
            <br><br>
            {{$comentarios->links()}}
        </div><br>
    </div>
    @endforeach
</div>


