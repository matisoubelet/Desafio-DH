<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Pelicula;
use App\Genero;
use App\Actor;
use Auth;

class peliculasController extends Controller
{
    public function listado(){

      $usuarioLog = Auth::user(); //Si el usuario esta logeado da un objeto tipo usuario, si no lo esta, da Null.


      $peliculas = Pelicula::paginate(6);

      $vac = compact("peliculas");
      return view('listadoPeliculas', $vac);
    }


    public function detalle($id){

      $pelicula = Pelicula::find($id);  //Esto es equivalente a un "SELECT * FROM movies (porque Pelicula pusimos que es movies)
                                                                    //WHERE id (Porque marcamos que id es la PK de movies)" = $id
      $vac = compact("pelicula");

      return view('detallePelicula', $vac);
    }


//    public function top(){
//      $peliculas = Pelicula::where("rating", ">", 6)
//      ->orderBy("title")
//      ->get();                        //A diferencia del all() o el find() (siendo estas las unicas), la funcion where necesita finalizar con un get()
//                                    //Siendo que de otra forma, nunca se ejecutaria la funcion.
//      $vac = compact("peliculas");
//
//      return view('listadoPeliculas', $vac);
//    }



    public function agregar(Request $req){

      $relgas = [
        "title"         => "string|min:3|unique:movies,title",
        "rating"        => "numeric|min:0|max:10",               // Validaciones: https://laravel.com/docs/5.8/validation#available-validation-rules
        "awards"        => "integer|min:0",
        "genre"         => "require",
        "release_date"  => "date",
        "poster"        => "file"
      ];

      $mensajes = [
        "string"  => "El campo :attribute debe ser un texto",
        "min"     => "El campo :attribute tiene un minimo de :min",
        "max"     => "El campo :attribute tiene un maximo de :max",
        "date"    => "El campo :attribute debe ser una fecha",
        "numeric" => "El campo :attribute debe ser un numero",
        "integer" => "El campo :attribute debe ser un numero entero",
        "unique"  => "El campo :attribute se encuentra repetido",
        "require" => "El campo:attribute debe ser completo"
      ];

      $this->validate($req, $relgas, $mensajes);

      $peliculaNueva = new Pelicula();

      $ruta = $req->file("poster")->store("public"); //Genera la ruta de la imagen y la guarda en public.
      $nombreArchivo = basename($ruta);             //Recorta el excedente de la ruta y nos deja el nombre.

      $peliculaNueva->title = $req["title"];
      $peliculaNueva->rating = $req["rating"];
      $peliculaNueva->awards = $req["awards"];
      $peliculaNueva->release_date = $req["release_date"];
      $peliculaNueva->poster = $nombreArchivo;
      $peliculaNueva->genre_id = $req["genres"];

      $peliculaNueva->save();

  //    $actoresNuevos = new Actor();
  //
  //    $actoresNuevos->first_name = $req["first_name1"];
  //    $actoresNuevos->first_name = $req["first_name2"];
  //    $actoresNuevos->first_name = $req["first_name3"];
  //    $actoresNuevos->last_name = $req["last_name1"];
  //    $actoresNuevos->last_name = $req["last_name2"];
  //    $actoresNuevos->last_name = $req["last_name3"];
  //
  //    $actoresNuevos->save();

//      <div class="text">
//
//        <label for="actors"><h4 class="form">Actores</h4></label>
//
//        <p>Primer actor:</p>
//
//        <input type="text" name="first_name1" placeholder="Nombre" value="{{old("first_name1")}}">
//
//        <input type="text" name="last_name1" placeholder="Apellido" value="{{old("last_name1")}}">
//
//        <p>Segundo actor:</p>
//
//        <input type="text" name="first_name2" placeholder="Nombre" value="{{old("first_name2")}}">
//
//        <input type="text" name="last_name2" placeholder="Apellido" value="{{old("last_name2")}}">
//
//        <p>Tercer actor:</p>
//
//        <input type="text" name="first_name3" placeholder="Nombre" value="{{old("first_name3")}}">
//
//        <input type="text" name="last_name3" placeholder="Apellido" value="{{old("last_name3")}}">
//
//      </div>

      return redirect("/titulos");
    }


    public function identificar($id){

      $pelicula = Pelicula::find($id);
      $vac = compact("pelicula");

      return view("/editarPelicula", $vac);
    }


    public function editar(Request $req){

      $id = $_POST["id"];

      $relgas = [
        "title"         => "string|min:3|unique:movies,title",
        "rating"        => "numeric|min:0|max:10",               // Validaciones: https://laravel.com/docs/5.8/validation#available-validation-rules
        "awards"        => "integer|min:0",
        "genre"         => "require",
        "release_date"  => "date",
        "poster"        => "file"
      ];

      $mensajes = [
        "string"  => "El campo :attribute debe ser un texto",
        "min"     => "El campo :attribute tiene un minimo de :min",
        "max"     => "El campo :attribute tiene un maximo de :max",
        "date"    => "El campo :attribute debe ser una fecha",
        "numeric" => "El campo :attribute debe ser un numero",
        "integer" => "El campo :attribute debe ser un numero entero",
        "unique"  => "El campo :attribute se encuentra repetido",
        "require" => "El campo:attribute debe ser completo"
      ];

      $this->validate($req, $relgas, $mensajes);

      $peliculaNueva = Pelicula::find($id);

      $ruta = $req->file("poster")->store("public"); //Genera la ruta de la imagen y la guarda en public.
      $nombreArchivo = basename($ruta);             //Recorta el excedente de la ruta y nos deja el nombre.

      $peliculaNueva->title = $req["title"];
      $peliculaNueva->rating = $req["rating"];
      $peliculaNueva->awards = $req["awards"];
      $peliculaNueva->genre_id = $req["genres"];
      $peliculaNueva->release_date = $req["release_date"];
      $peliculaNueva->poster = $nombreArchivo;

      $peliculaNueva->save();

      return redirect("/titulos");

    }


    public function borrar(Request $form){
      $id = $form["id"];

      $pelicula = Pelicula::find($id);
      $pelicula->delete();

      return redirect("/peliculas");
    }


    public function listadoAPI(){
      $peliculas = Pelicula::all();   //Genera un json con todo el contenido de movies

       return json_encode($peliculas);
    }

    public function buscar()
    {
        $buscar = Input::get ( 'buscar' );
        if($buscar != ""){
            $resultados = Pelicula::where ( 'title', 'LIKE', '%' . $buscar . '%' )->get();
            if (count ( $resultados ) > 0)
                return view ( '/resultados', compact("resultados") )->withDetails ( $resultados )->withQuery ( $buscar );
            else
                return view ( '/resultados', compact("resultados") )->withMessage ( "No se han encontrado resultados, intentalo de nuevo!" );
        }
        return view ( '/resultados' )->withMessage ( "No se han encontrado resultados, intentalo de nuevo!" );
    }


}
