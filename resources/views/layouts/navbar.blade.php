<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark text-white">
        <a class="navbar-brand" href="{{url('/')}}">www.moviemegamp4.com</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
              <li class="nav-item active">
                  <a class="nav-link" href="{{url('/indexp')}}">Programas y juegos <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                  <a class="nav-link" href="{{url('/')}}">Peliculas <span class="sr-only">(current)</span></a>
              </li>
              @if(session('usuario_id'))
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-expanded="true" >Lenguajes</a>
                          <ul class="dropdown-menu" aria-labelledby="dropdown02">
                              <li><a class="dropdown-item" href="{{url('/languages')}}">Registrar Lenguaje</a></li>
                          </ul>
                      </li>
                     <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="true" >Categorias</a>
                          <ul class="dropdown-menu" aria-labelledby="dropdown01">
                              <li><a class="dropdown-item" href="{{url('/categorias')}}">Registrar categoría pelicula</a></li>
                              <li><a class="dropdown-item" href="{{url('/pcategorias')}}">Registrar categoría programa</a></li>
                          </ul>
                     </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-expanded="true" >Peliculas</a>
                          <ul class="dropdown-menu" aria-labelledby="dropdown03">
                              <li><a class="dropdown-item" href="{{url('/peliculas')}}">Registrar pelicula</a></li>
                          </ul>
                      </li>

                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-expanded="true" >Programas</a>
                      <ul class="dropdown-menu" aria-labelledby="dropdown04">
                          <li><a class="dropdown-item" href="{{url('/programas')}}">Registrar programas</a></li>
                      </ul>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="dropdown06" data-toggle="dropdown" aria-expanded="true" >{{session('nombreu')}}</a>
                      <ul class="dropdown-menu" aria-labelledby="dropdown06">
                          <li><a class="dropdown-item" href="{{url('/login')}}">Cerrar sesión</a></li>
                      </ul>
                  </li>
              @endif
              @if(session('perfil')=='Administrador')
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-expanded="true" >Usuarios</a>
                  <ul class="dropdown-menu" aria-labelledby="dropdown05">
                      <li><a class="dropdown-item" href="{{url('/usuarios')}}">Registrar usuarios</a></li>
                  </ul>
              </li>
              @endif
              <li class="nav-item active">
                  <a class="nav-link" href="{{url('/login')}}">Login <span class="sr-only">(current)</span></a>
              </li>

          </ul>
        </div>
</nav>


