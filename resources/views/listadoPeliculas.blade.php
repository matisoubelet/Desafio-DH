

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/styles.css">
    <title> @yield("titulo") </title>
  </head>
  <body>

    <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('home') }}">Home</a>
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
          </ul>
          <form class="form-inline my-2 my-lg-0" action="/resultados" method="get">

            <input class="form-control mr-sm-2" type="text" name="buscar" placeholder="Buscar" aria-label="Search">

            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Enviar</button>
          </form>
        </div>
      </nav>
    </header>

<div class="contenedor">

  <div class="tituloPrincipal">
    <h1>Mis Peliculas</h1>
  </div>

<ul>
  @forelse($peliculas as $pelicula)
  <li>

    <div class="peliculas">
    <h3> <a href="/pelicula/{{$pelicula->id}}"> {{$pelicula->title}} </a> </h3>

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
