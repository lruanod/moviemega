<div class="row">
    @foreach($descargapeliculas as $descargapelicula)
    <div class="col-12 text-white text-center">
        <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded"> 	<h1 class="p-3 mb-2 ">Descargas</h1>

        </div>
        <div class="container bg-dark text-warning rounded"><br>
            <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
                <h5 class="p-2 mb-1 text-white">Instrucciones</h5>
            </div>

            <p>Hacer click en la publicidad, no cierres la ventana del navegador y espera 50 segundos, para ser redirigido a la descarga</p>
            <h1 id="mensaje" ></h1>

        </div><br>

        <div class="container bg-dark text-warning rounded"><br>
                <iframe id="iframe"  src="//a.exdynsrv.com/iframe.php?idzone=4358642&size=300x250" width="300" height="250" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" >
                </iframe>
                <br><br>
            <img class="rounded" src="{{asset("storage/".$descargapelicula->descarga->logod)}}" alt="Generic placeholder image" width="60" height="45"><br>
            <span>Servidor: {{$descargapelicula->descarga->servidord}}/{{$descargapelicula->lenguajepelicula->lenguaje->nombrel}}/{{$descargapelicula->lenguajepelicula->lenguaje->descripcionl}}</span> <br><br>
        </div><br>

    </div>
    @endforeach
</div>


        <script type="text/javascript">
            var contador = 50; // Segundos
            var redirecciona = "{{$urld}}";

            var monitor = setInterval(function(){
                var elem = document.activeElement;
                if(elem && elem.tagName == 'IFRAME'){
                    temporizador()
                    clearInterval(monitor);
                }
            }, 100);

            function temporizador() {
                var mensaje = document.getElementById("mensaje");
                if (contador > 0) {
                    contador--;
                    mensaje.innerHTML = "Redireccionando en " + contador + " segundos.";
                    setTimeout("temporizador()", 1000);
                } else {

                    window.open(redirecciona, '_blank');
                }
            }

        </script>





