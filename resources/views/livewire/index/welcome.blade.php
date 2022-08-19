<div id="crud" class="row">
    <div class="col-lg-8"> <!-- ancho 8 peliculas-->
        @foreach($lenguajes as $lenguaje)
            @php($cont2=0)
            @foreach($lenguaje_peliculas as $lenguaje_movie)
                @if($lenguaje_movie->lenguaje_id==$lenguaje->id )
                    @if($cont2==0)
                        @php($cont2=1)
                        <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
                            <h1 class="p-3 mb-2  text-white text-center">{{$lenguaje_movie->lenguaje->nombrel}}</h1>
                        </div>
                        <div class="row"> <!-- inicio row-->
                    @endif
                            @foreach($peliculas as $movie)
                                @if($movie->pelicula_id==$lenguaje_movie->pelicula_id & $lenguaje->id==$movie->lenguaje_id)
                                    <div class="btn-outline-light btn-lg col-lg-4"> <!-- inicio tarjeta-->
                                        <a href="/showpelicula/{{$movie->id}}">
                                            <div class=" shadow-lg card-p-4 mb-3 rounded text-white" style="width: 100%; height: 95%; border-color: #F4D03F #E74C3C #F4D03F #E74C3C;  border-width: 0.5vw ; border-style: solid; background-image: url(images/estrellas.gif);" >
                                                <br>
                                                <div class="text-center">
                                                    <img class="rounded" src="storage/{{$movie->portada}}" alt="Generic placeholder image" width="100vw" height="150vh"  href="#">
                                                </div>
                                                <div class="card-body" style="  width: 100%; height: 5%;">
                                                    <div style="background-color:#566573; border-color: #F4D03F #E74C3C #F4D03F #E74C3C;  border-width: 0.5vw; border-style: solid; ">
                                                        <font size="2">  <p class="card-text text-center">{{$movie->nombre}}<br>Calidad:&nbsp;{{$movie->calidad}}<br>Estreno:&nbsp;{{\carbon\carbon::parse($movie->fechaestreno)->format('d/m/Y')}}</p> </font>
                                                    </div>
                                                    <div class="text-warning text-center">
                                                        <font size="4">
                                                            @if($movie->estrella==5)
                                                                ★ ★ ★ ★ ★
                                                            @endif
                                                            @if($movie->estrella==4)
                                                                ★ ★ ★ ★
                                                            @endif
                                                            @if($movie->estrella==3)
                                                                ★ ★ ★
                                                            @endif
                                                            @if($movie->estrella==2)
                                                                ★ ★
                                                            @endif
                                                            @if($movie->estrella==1)
                                                                ★
                                                            @endif
                                                        </font>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div> <!-- fin tarjeta-->
                                @endif
                            @endforeach

                            @endif

                            @endforeach
                            @if($cont2==1)
                        </div> <!-- fin row-->
                         @endif
        @endforeach
                    {{$peliculas->links()}}
    </div>   <!-- fin ancho 8 peliculas-->

    <!-- ANCHO DE LOS GENEROS -->
    <div class="col-lg-4">
        <div class="row">
            <div class="container text-white rounded" style="border-color: #F4D03F #E74C3C #F4D03F #E74C3C;  border-width: 5px ; border-style: solid; background-image: url(image/estrellas.gif);"> </br>
                <!-- formulario de busqueda-->
                    <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
                        <h5 class="p-2 mb-1  text-white text-center">Busqueda</h5>
                    </div>
                    <div class="form-row align-items-center">

                            <div class="col-sm-9 my-1">
                                <input type="text" class="form-control"  wire:model="buscar"  id="buscar" placeholder="Buscar">
                            </div>
                            <div class="col-auto my-1">
                                <button class="btn btn-primary" wire:click="bbuscar({{$buscar}})" >Buscar</button>
                            </div>
                    </div></br>
                <!-- fin formulario de busqueda-->

                <!-- generos-->
                <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
                    <h5 class="p-2 mb-1  text-white text-center">Generos</h5>
                </div> </br>
                <div class="text-center">
                    @foreach($categorias as $category)
                        <button  wire:click="bcategoria({{ $category->id }})" class="btn btn-outline-warning">{{$category->nombrec}}</button>
                    @endforeach
                </div>  </br>
                <!--fin de generos-->

                <!--idiomas-->
                <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
                    <h5 class="p-2 mb-1  text-white text-center">Idiomas</h5>
                </div></br>

                <div class="text-center">
                    @foreach($lenguajes as $lenguaje)
                        <button class="btn btn-outline-warning" wire:click="blenguaje({{ $lenguaje->id }})" role="button">
                            <img class="rounded"  src="storage/{{$lenguaje->bandera}}" alt="Generic placeholder image" width="45" height="30">
                            </br>{{$lenguaje->nombrel}}</button>
                    @endforeach
                </div></br>

                <!-- fin de idiomas-->
                <!-- Estrenos en latino-->
                @foreach($lenguajes as $lenguaje2)
                    @php($cont=0)
                    @foreach($lenguaje_peliculas2 as $lenguaje_movie2)
                        @if($lenguaje_movie2->lenguaje->id==$lenguaje2->id )
                            @if($cont==0 )
                                @php($cont=1)
                                <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
                                    <h5 class="p-2 mb-1  text-white text-center">{{$lenguaje_movie2->lenguaje->nombrel}}</h5>
                                </div><br><br>

                                    @endif
                                    @foreach($peliculas2 as $movie)
                                        @if($movie->id==$lenguaje_movie2->pelicula_id)
                                            <div class="col-lg-4 btn-outline-light btn-lg">
                                                <a href="/showpelicula/{{$movie->id}}}">
                                                    <div class="shadow-lg card-p-2 ml-1 mb-1 rounded">
                                                        <img class="rounded" src="storage/{{$movie->portada}}" alt="Generic placeholder image" width="80vw" height="145vh">
                                                    </div>
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                    @endif
                                    @endforeach

                            @endforeach
                            <!-- fin Estrenos en latino-->
                                <!-- Estrenos en castellano-->
            </div> <br>
        </div>	<!-- marco -->
    </div>
</div> <!-- ANCHO DE LOS GENEROS -->






