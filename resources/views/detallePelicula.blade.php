@extends("plantilla")

@section("titulo")
  Detalle de pelicula
@endsection

@section("principal")

<h1>Usted eligio la pelicula {{$pelicula->title}}</h1>
<div class="poster">
  <img src="/storage/{{$pelicula->poster}}" alt="Poster">
  <h3>Rating: {{$pelicula->rating}} </h3>
  <h3>Awards: {{$pelicula->awards}} </h3>
  @if($pelicula->genero)
    <h3>Genero: {{$pelicula->genero->name}}</h3>
  @endif
  <h3>Actores:
   <ul>
    @foreach($pelicula->actores as $actor)
    <li>
      {{$actor->getnombreCompleto()}}
    </li>
    @endforeach
  </ul>
</h3>
</div>

<form class="" action="/borrarPelicula" method="post">
  {{csrf_field()}}
  <input type="hidden" name="id" value="{{$pelicula->id}}">
  <input type="submit" name="" value="Borrar Pelicula">
</form>
@endsection
