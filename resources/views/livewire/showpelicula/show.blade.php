<div class="row">
    @foreach($peliculas as $pelicula)
    <div class="col-lg-12 text-white text-center">

        <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded"> 	<h1 class="p-3 mb-2 ">{{$pelicula->nombre}} </h1>

        </div>


        <div class="container bg-dark text-warning rounded"><br>
            <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
                <h5 class="p-2 mb-1 text-white">Trailer</h5>
            </div>

            <div class="embed-responsive" >
                <x-embed url="{{$pelicula->trailer}}"/>
            </div> <br>


        </div><br>

        <div class="container bg-dark text-warning rounded"><br>
            <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
                <h5 class="p-2 mb-1 text-white">Sinopsis de la película</h5>
            </div>
            {{$pelicula->sinopsis}}<br><br>

        </div><br>


        <div class="container bg-dark text-warning rounded"><br>
            <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
                <h5 class="p-2 mb-1 text-white">Calidad</h5>
            </div>
            {{$pelicula->calidad}}<br><br>
        </div><br>

        <div class="container bg-dark text-warning rounded"><br>
            <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
                <h5 class="p-2 mb-1 text-white">Idioma</h5>
            </div><br>

            @foreach($lenguajepeliculas as $lenguajepelicula)
                <img class="rounded" src="{{asset("storage/".$lenguajepelicula->lenguaje->bandera)}}" alt="Generic placeholder image" width="100vw" height="60vh"  href="#"><br>
                Idioma:&nbsp;{{$lenguajepelicula->lenguaje->nombrel}}&nbsp;/{{$lenguajepelicula->lenguaje->descripcionl}}<br>

            @endforeach

            <br><br>

            <br>
        </div><br>

        <div class="container bg-dark text-warning rounded"><br>
            <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
                <h5 class="p-2 mb-1 text-white">Capturas</h5>
            </div>

            @foreach($scrims as $scrim)
                <img class="rounded" src="{{asset("storage/".$scrim->urls)}}" alt="Generic placeholder image" width="600vw" height="400vh"  href="#"><br>
                <br><br>
            @endforeach

        </div><br>


        <div class="container bg-dark text-warning rounded"><br>
            <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
                <h5 class="p-2 mb-1 text-white">Descargas</h5>
            </div> <br>

            @foreach($descargapeliculas as $descargas)
                <img class="rounded" src="{{asset("storage/".$descargas->logod)}}" alt="Generic placeholder image" width="100vw" height="60vh"  href="#"><br>
                    Servidor: {{$descargas->servidord}}/{{$descargas->nombrel}}/{{$descargas->descripcionl}}<br>
                   <a class="btn btn-outline-warning" href="/showdescarga/{{$descargas->id}}">Descarga</a><br><br>
            @endforeach
            <br>
        </div><br>


        <div class="container bg-dark text-warning rounded"><br>
            <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
                <h5 class="p-2 mb-1 text-white">Ver online</h5>
            </div>
            <h5 class="p-2 mb-1 text-white"> Seleciona el tipo de servidor online</h5>

            @foreach($servidorpeliculas as $servidors)
                <img class="rounded" src="{{asset("storage/".$servidors->logos)}}" alt="Generic placeholder image" width="100vw" height="60vh"  href="#"><br>
                   Servidor online: {{$servidors->nombres}}/{{$servidors->nombrel}}/{{$servidors->descripcionl}}<br>
                   <a class="btn btn-outline-warning" href="/showonline/{{$servidors->id}}">Ver online</a><br><br>
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
                        <input type="text" name="usuario"   value="{{$comentario->usuario}}" class="form-control col-md-9"  readonly="readonly">
                    </div>
                    <div class="row form-group">
                        <label for="" class="col-2">Comentario</label>
                        <textarea name="descripcion" class="form-control col-md-9" rows="2" cols="9" readonly="readonly">{{$comentario->descripcionc}}</textarea>
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


