@extends("plantilla")

@section("titulo")
  Detalle de Actor
@endsection

@section("principal")
<div class="contenedor">


  <div class="posterActores">
    <div class="titulosPrincipal">
      <h1> {{$actores->first_name}} {{$actores->last_name}} </h1>
      <h3>Peliculas donde trabajo:
    </div>
     <ul>
      @foreach($actores->peliculas as $pelicula)
      <li>
        <a href="/pelicula/{{$pelicula->id}}">
          <img src="/storage/{{$pelicula->poster}}" alt="Poster">
        </a>
      </li>
      @endforeach
    </ul>
  </h3>

<div class="borrar">
  <form class="" action="/borrarActor" method="post">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$actores->id}}">
    <input type="submit" name="" value="Borrar actor">
  </form>
  </div>

  <div class="editar">
    <form class="" action="/editarActor/{{$actores->id}}" method="get">
      <input type="hidden" name="id" value="{{$actores->id}}">
      <input type="submit" name="" value="Editar Actor">
    </form>
  </div>
</div>

</div>


@endsection
