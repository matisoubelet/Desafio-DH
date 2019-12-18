@extends("plantilla")

@section("titulo")
  Listado de Actores
@endsection

@section("principal")
<div class="contenedor">

    <ul>
      @forelse($actores as $actor)
      <li>
        <div class="actores">
        {{$actor->getNombreCompleto()}}
      </li>
      @empty
      <p>
        No hay actores.
      </p>
      </div>
      @endforelse
    </ul>
  </div>

<div class="scroll">
  <h4>{{$actores->links()}}</h4>
</div>

@endsection
