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
    <form class="" action="/agregarActor" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="text">
        <label for="first_name"><h4 class="form">Nombre:</h4></label>
        <input type="text" name="first_name" value="{{old("first_name")}}">
      </div>

      <div class="text">
        <label for="last_name"><h4 class="form">Apellido:</h4></label>
        <input type="text" name="last_name" value="{{old("last_name")}}">
      </div>


      <div class="">
        <input type="submit" name="" value="Agregar Pelicula">
      </div>
    </form>
  </div>
</div>



@endsection
