<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
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
        </div>
      </nav>
    </header>

    <section>
      @yield("principal")
    </section>
    <footer class="footer">
      <h2>Challenge Matias Soubelet 2019</h2>
    </footer>
  </body>
</html>
