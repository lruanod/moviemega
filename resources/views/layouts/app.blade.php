<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <title>megamovie = @yield('title')</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/portada.css') }}" rel="stylesheet">
      <!-- iconos -->
      <link href="{{ asset('assets/dist/bootstrap-icons.css') }}" rel="stylesheet">
      <!-- toastr.min.css -->
      <link href="{{ asset('assets/dist/css/toastr.min.css') }}" rel="stylesheet">
      <x-embed-styles />
      @livewireStyles
  </head>
  <body style="background-image: url(/images/estrellas.gif);">
    <header>
      @extends('layouts.navbar')
    </header>

 <div  style="max-height:90vh; min-height:10%; background-image:url(/images/estrellas.gif);">
        <!-- portada -->
	     <img src="/images/portada limpia.png"  style=" opacity: 70%; position: relative; width: 100%; max-height:80vh; min-height:5vw;" >
				<div id="wrapper"  style="margin-top: 3vw;">
				  <p id="stars"><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span></p>
				  <p id="title" contenteditable="true" spellcheck="false"><span>Movie</span><span>-mega</span><span>-mp4.</span><span>com</span></p>
				  <p id="slogan"><span>Peliculas, Programas y más...</span></p>
				</div>
</div>

    <main role="main">
        <br>
		<!-- contenedor -->
		<div  style="background-image: url(/images/fondo.jpg);" class="container marketing">

		        @yield('content')
		</div>
		<!-- /fin de contenedor -->


      <!-- FOOTER -->
        <br>
        <br>
      <footer class="container text-center">
          <a class="float-right btn btn-outline-warning" href="/">Inicio</a>  <a href="/legal" class=" float-left btn btn-outline-warning"> Aviso Legal</a>
           <h3 class="text-white">Copyright ©  2021 Moviemega </h3>
           <p class="text-white">Descargo de responsabilidad: este sitio no almacena ningún archivo en su servidor. Todos los contenidos son proporcionados por terceros no afiliados.</p>
      </footer>
      <!-- fin FOOTER -->

    </main>

       @livewireScripts
       <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
       <script src="{{ asset('js/bootstrap.min.js') }}"></script>
       <script src="{{ asset('assets/dist/js/toastr.min.js') }}"></script>
       <script src="{{ asset('js/popper.min.js') }}"></script>
       <script src="{{ asset('js/app.js') }}"></script>

    <script>
        // alerta para crear
        window.addEventListener('alert',event =>{
            toastr.success(event.detail.message)
        })
        // alerta para editar
        window.addEventListener('alert2',event =>{
            toastr.info(event.detail.message)
            var obj=document.getElementById('cerrar');
            obj.click();
        })
        /// alerta para eliminar
        window.addEventListener('alert3',event =>{
            toastr.error(event.detail.message)
        })
        // alerta para imagen asignada
        window.addEventListener('alertasignar',event =>{
            toastr.success(event.detail.message)
            var obj=document.getElementById('cerrarformasignar');
            obj.click();
        })
        // alerta para editar imagen asignada
        window.addEventListener('alerteditasignar',event =>{
            toastr.info(event.detail.message)
            var obj=document.getElementById('cerrarasignar');
            obj.click();
        })






    </script>

  </body>


</html>
