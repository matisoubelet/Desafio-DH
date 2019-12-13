@extends("plantilla")

@section("titulo")
  Listado de Actores
@endsection

@section("principal")

<h1>Mis Actores</h1>
<ul>
  @forelse($actores as $actor)
  <li>
    {{$actor->getNombreCompleto()}}
  </li>
  @empty
  <p>
    No hay actores.
  </p>
  @endforelse
</ul>

{{$actores->links()}}

@endsection
