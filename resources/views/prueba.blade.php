<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Anton|Cabin&display=swap" rel="stylesheet">
    <title> @yield("titulo") </title>
  </head>
  <body>
    <header>
      <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dropdown button
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{ route('home') }}">Inicio</a>
        <a class="dropdown-item" href="{{ route('actores') }}">Actores</a>
        <a class="dropdown-item" href="{{ route('listadoGeneros') }}">Generos</a>
        <a class="dropdown-item" href="{{ route('titulos') }}">Titulos</a>
        <a class="dropdown-item" href="{{ URL::to('agregarPelicula') }}">Añadir pelicula</a>
        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
      </div>
    </div>
    </header>

    <section>
      @yield("principal")
    </section>

    <footer class="footer">
      <h2>Challenge Matias Soubelet 2019</h2>
    </footer>
  </body>
</html>
