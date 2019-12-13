@extends("plantilla")

@section("principal")

<div class="contenedor">

<div class="tituloPrincipal borde">
  <h1>Generos</h1>
</div>

<ul>
  @foreach($generos as $genero)
  <li>
    <div class="generos">
    <h3>{{$genero->name}}</h3>
      <ul>
        @foreach ($genero->peliculas as $pelicula)
        <li>
          {{$pelicula->title}}
        </li>
        @endforeach
      </ul>
    </li>

    @endforeach
   </ul>

  </div>

</div>

<div class="scroll">
<h4>{{$generos->links()}}</h4> 
</div>


@endsection
