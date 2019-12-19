@extends("plantilla")

@section("principal")
<div class="flex">
  <div class="contenedor">
    <div class="agregarPelicula">
      @if (count($errors) > 0)
      <div class="error">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <form class="" action="/actores" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <label for="actor_id"><h4 class="form">Seleccione la pelicula donde actuo {{$actor->first_name}}:</h4></label>
    <input name="actor_id" type="hidden" value="{{$actor->id}}">
    <select class="" name="movie_id">
      @foreach ($peliculas as $pelicula)
      <option value="{{$pelicula->id}}">
        {{$pelicula->title}}
      </option>
      @endforeach

      <div class="">
        <input type="submit" name="" value="Agregar a pelicula">
      </div>
  </form>
  </div>
  </div>
</div>

@endsection
