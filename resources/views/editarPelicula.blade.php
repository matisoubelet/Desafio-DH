@extends("plantilla")

@section("principal")


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

<form class="" action="/editarPelicula" method="post" enctype="multipart/form-data">
  {{csrf_field()}}
  <input type="hidden" name="id" value="{{$pelicula->id}}">
  <div class="text">
    <label for="title"><h4 class="form">Titulo:</h4></label>
    <input type="text" name="title" placeholder="{{$pelicula->title}}" value="{{old("title")}}">
  </div>

  <div class="text">
    <label for="rating"><h4 class="form">Rating:</h4></label>
    <input type="text" name="rating" placeholder="{{$pelicula->rating}}" value="{{old("rating")}}">
  </div>

  <div class="text">
    <label for="awards"><h4 class="form">Awards:</h4></label>
    <input type="text" name="awards"placeholder="{{$pelicula->awards}}" value="{{old("awards")}}">
  </div>

  <div class="">
    <label for="release_date"><h4 class="form">Genero:</h4></label>
    <select class="" name="genres">
      <option value="1">
        Comedia
      </option>
      <option value="2">
        Terror
      </option>
      <option value="3">
        Drama
      </option>
      <option value="4">
        Acción
      </option>
      <option value="5">
        Ciencia Ficción
      </option>
      <option value="6">
        Suspenso
      </option>
      <option value="7">
        Animacion
      </option>
      <option value="8">
        Aventuras
      </option>
      <option value="9">
        Documental
      </option>
      <option value="10">
        Infantiles
      </option>
      <option value="11">
        Fantasía
      </option>
      <option value="12">
        Musical
      </option>
    </select>
  </div>

  <div class="">
    <label for="release_date"><h4 class="form">Fecha de estreno:</h4></label>
    <input type="date" name="release_date" value="{{old("release_date")}}">
  </div>

  <div class="">
    <label for="poster"><h4 class="form">Poster:</h4></label>
    <input type="file" name="poster" value="{{old("poster")}}">
  </div>

  <div class="">
    <input type="submit" name="" value="Editar Pelicula">
  </div>

</form>
  </div>


@endsection
