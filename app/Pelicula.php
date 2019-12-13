<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    public $table = "movies";     //Esto aclara el nombre de la tabla de la base de datos que se va a usar.
  //public $primaryKey = "id";   //Esto aclara el nombre de la clave primaria como "id". Si ya es "id", la linea es inutil.
  //public $timestamps = false; //Esto aclara que no hay timestamps (created_at, updated_at) Si los hay, la linea es inutil.
    public $guarded = [];      //Esto aclara que la tabla puede manipularse por completo. En caso de querer que una parte no se pueda alterar, se completa dentro.

    public function genero(){
      return $this->belongsTo("App\Genero", "genre_id");
    }

    public function actores(){
      return $this->belongsToMany("App\Actor", "actor_movie", "movie_id", "actor_id");
                                                                                            //Relacion N:M : al igual que en la relacion 1:N, en primer lugar se declara que tipo de objeto va a devolver.
                                                                                            //En segundo lugar le nombre de la tabla intermedia.
                                                                                            //En tercer y cuarto lugar las claves foraneas de las tablas. Pero siempre primero la del modelo en donde estamos parados
                                                                                            //En este caso, como estamos en "Pelicula.php", se coloca en primer lugar "actor_id", y en segundo lugar la relacion que estamos tratando de definir.

    }

}
