

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Anton|Cabin&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/styles.css">
    <title> @yield("titulo") </title>
  </head>
  <body>

    <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('home') }}">Inicio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('actores') }}">Actores</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('listadoGeneros') }}">Generos</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('titulos') }}">Titulos</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{ URL::to('agregarPelicula') }}">Añadir pelicula</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{ URL::to('agregarActor') }}">Añadir Actor</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0" action="/resultados" method="get">

            <input class="form-control mr-sm-2" type="text" name="buscar" placeholder="Buscar" aria-label="Search">

            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Enviar</button>
          </form>
        </div>
      </nav>
    </header>

<div class="contenedor">

<ul>
  @forelse($peliculas as $pelicula)
  <li>

    <div class="peliculas imgFondo">
    <h3 class="tituloPelicula"> <a href="/pelicula/{{$pelicula->id}}"> {{$pelicula->title}} </a> </h3>

    <div class="tipografia">
    @if($pelicula->genero)
    <h5>Genero:</h5>
    <p> {{$pelicula->genero->name}} </p>
    @endif

    <h5>Actores:</h5>
    <ul>
      @foreach($pelicula->actores as $actor)
      <li>
        {{$actor->getnombreCompleto()}}
      </li>
      @endforeach
    </ul>

    @unless ($pelicula->rating < 8)
    <p> Clasificada Excelente</p>
    @endunless
    </div>
  </li>
  @empty
  <p>
    No hay peliculas.
  </p>
  @endforelse
</ul>
</div>
</div>
<div class="scroll">
  <h4>{{$peliculas->links()}}</h4>
</div>
<footer class="footer">
  <h2>Challenge Matias Soubelet 2019</h2>
</footer>
