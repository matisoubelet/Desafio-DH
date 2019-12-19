<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Pelicula;
use App\Genero;
use App\Actor;
use Auth;

class actoresController extends Controller
{
    public function listado() {
      $actores = Actor::paginate(18);

      $vac = compact("actores");
      return view("listadoActores", $vac);
    }

    public function datos(){
      $peliculas = Pelicula::all();

      $vac = compact("peliculas");

      return view("agregarActor", $vac);
    }


    public function agregar(Request $req){

      $relgas = [
        "first_name"    => "string|min:3|unique:actors,first_name",
        "last_name"     => "string|min:3|unique:actors,last_name",               // Validaciones: https://laravel.com/docs/5.8/validation#available-validation-rules
      ];

      $mensajes = [
        "string"  => "El campo :attribute debe ser un texto",
        "min"     => "El campo :attribute tiene un minimo de :min",
        "unique"  => "El campo :attribute se encuentra repetido"
      ];

      $this->validate($req, $relgas, $mensajes);

      $actorNuevo = new Actor();

      $actorNuevo->first_name = $req["first_name"];
      $actorNuevo->last_name = $req["last_name"];

      $actorNuevo->save();

      return redirect("actores");
    }

    public function actorMovie($id) {

      $actor = Actor::find($id);  //Esto es equivalente a un "SELECT * FROM movies (porque Pelicula pusimos que es movies)
      $peliculas = Pelicula::all();
                                                                          //WHERE id (Porque marcamos que id es la PK de movies)" = $id
      $vac = compact("actor", "peliculas");

      return view('/actormovie', $vac);

    }

    public function agregarActor(Request $req){

      $actor_id = $_POST["actor_id"];
      $movie_id = $_POST["movie_id"];

      $relgas = [
        "actor_id"    => "integer",
        "movie_id"     => "integer"              // Validaciones: https://laravel.com/docs/5.8/validation#available-validation-rules
      ];

      $mensajes = [
        "integer" => "El campo :attribute debe ser un numero entero"
      ];

      $actorNuevo = new Actor();

      $actorNuevo->actor_id = $req["actor_id"];
      $actorNuevo->movie_id = $req["movie_id"];

      $actorNuevo->save();

      return redirect("actores");

    }

}
