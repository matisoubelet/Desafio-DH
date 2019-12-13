<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelicula;
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
        "title" => "string|min:3|unique:movies,title",
        "rating" => "numeric|min:0|max:10",               // Validaciones: https://laravel.com/docs/5.8/validation#available-validation-rules
        "awards" => "integer|min:0",
        "release_date" => "date",
        "poster" => "file"
      ];

      $mensajes = [
        "string" => "El campo :attribute debe ser un texto",
        "min" => "El campo :attribute tiene un minimo de :min",
        "max" => "El campo :attribute tiene un maximo de :max",
        "date" => "El campo :attribute debe ser una fecha",
        "numeric" => "El campo :attribute debe ser un numero",
        "integer" => "El campo :attribute debe ser un numero entero",
        "unique" => "El campo :attribute se encuentra repetido"
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

      $peliculaNueva->save();

      return redirect("/peliculas");
    }


    public function borrar(Request $form){
      $id = $form["id"];

      $pelicula = Pelicula::find($id);
      $pelicula->delete();

      return redirect("/peliculas");
    }


    public function listadoAPI(){
      $peliculas = Pelicula::all();   //Genera un json con todo el contenido de movies

      return json_enconde($peliculas);
    }

    public function buscar(Request $request)
    {
        $buscar = $request->get('buscar');
        $resultados = Pelicula::table('movies')->where('title', 'like', '%buscar%')->get();

        return redirect('/resultados', compact('resultados'));
    }

}
