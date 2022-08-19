<div class="row">
    @foreach($servidorpeliculas as $servidorpelicula)
    <div class="col-12 text-white text-center">
        <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded"> 	<h1 class="p-3 mb-2 ">Descargas</h1>

        </div>
        <div class="container bg-dark text-warning rounded"><br>
            <div style="background: linear-gradient(to bottom, #F4D03F , #E74C3C );" class="rounded">
                <h5 class="p-2 mb-1 text-white">Instrucciones</h5>
            </div>

            <p>Hacer click en la publicidad, no cierres la ventana del navegador y espera 50 segundos, para ser redirigido al servidor online</p>
            <h1 id="mensaje" ></h1>

        </div><br>

        <div class="container bg-dark text-warning rounded"><br>
                <iframe id="iframe"  src="//a.exdynsrv.com/iframe.php?idzone=4358642&size=300x250" width="300" height="250" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" >
                </iframe>
                <br><br>
            <div class="embed-responsive align-content-center" style="width:79vw; height:65vh" >
                <div id="pelicula">
                    <iframe src="{{$urls}}"  allowfullscreen="" frameborder="0" sandbox="allow-scripts allow-same-origin allow-presentation" layout="responsive"></iframe>'
                </div>
            </div>

            <br>
            <img class="rounded" src="{{asset("storage/".$servidorpelicula->servidor->logos)}}" alt="Generic placeholder image" width="60" height="45"><br>
            <span>Servidor: {{$servidorpelicula->servidor->nombres}}/{{$servidorpelicula->lenguajepelicula->lenguaje->nombrel}}/{{$servidorpelicula->lenguajepelicula->lenguaje->descripcionl}}</span> <br><br>
        </div><br>

    </div>
    @endforeach
</div>


        <script type="text/javascript">
            var contador = 3; // Segundos
            var redirecciona = "{{$urls}}";
            document.getElementById("pelicula").style.display = "none";

            var monitor = setInterval(function(){
                var elem = document.activeElement;
                if(elem && elem.tagName == 'IFRAME'){
                    temporizador()
                    clearInterval(monitor);
                }
            }, 100);

            function temporizador(){
                var mensaje = document.getElementById("mensaje");
                if(contador > 0){
                    contador--;
                    mensaje.innerHTML = "Redireccionando en "+contador+" segundos.";
                    setTimeout("temporizador()", 1000);
                }else{
                    document.getElementById("pelicula").style.display = "block";
                    window.open(redirecciona, '_blank');
                }
            }

        </script>





