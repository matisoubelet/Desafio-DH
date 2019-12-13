@extends("plantilla")

@section("principal")

<ul style = "color:red" class = "errores">
  @foreach ($errors->all() as $error)
  <li>
    {{$error}}
  </li>
</ul>
@endforeach

<form class="" action="/agregarPelicula" method="post" enctype="multipart/form-data">
  {{csrf_field()}}
  <div class="">
    <label for="title">Titulo:</label>
    <input type="text" name="title" value="{{old("title")}}">
  </div>

  <div class="">
    <label for="rating">Rating:</label>
    <input type="text" name="rating" value="{{old("rating")}}">
  </div>

  <div class="">
    <label for="awards">Awards:</label>
    <input type="text" name="awards" value="{{old("awards")}}">
  </div>

  <div class="">
    <label for="release_date">Fecha de estreno:</label>
    <input type="date" name="release_date" value="{{old("release_date")}}">
  </div>

  <div class="">
    <label for="poster">Poster:</label>
    <input type="file" name="poster" value="{{old("poster")}}">
  </div>

  <div class="">
    <input type="submit" name="" value="Agregar Pelicula">
  </div>

</form>

@endsection
