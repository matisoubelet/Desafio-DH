@extends('plantilla')

@section('principal')
<div class="flex">
  <div class="contenedor">
    <div class="home">
      <div class="pelisRandom">
        <ul>
          <h2 class="tituloPrincipal">Random</h2>
          @foreach($peliculas as $pelicula)
            <li>
              <h3>  <a href="/pelicula/{{$pelicula->id}}">{{$pelicula ->title}}</a></h3>
            </li>
            @endforeach
        </ul>
      </div>
      <div class="ultimasPelis">
        <ul>
          <h2 class = "tituloPrincipal">Ultimas Peliculas</h2>
          @foreach($ultimas as $ultima)
            <li>
              <h3>  <a href="/pelicula/{{$ultima->id}}">{{$ultima->title}}</a> </h3>
            </li>
            @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>


@endsection
