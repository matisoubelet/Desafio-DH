<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
  //public $table = "actors";     //Esto aclara el nombre de la tabla de la base de datos que se va a usar.
  //public $primaryKey = "id";   //Esto aclara el nombre de la clave primaria como "id". Si ya es "id", la linea es inutil.
  //public $timestamps = false; //Esto aclara que no hay timestamps (created_at, updated_at) Si los hay, la linea es inutil.
    public $guarded = [];      //Esto aclara que la tabla puede manipularse por completo. En caso de querer que una parte no se pueda alterar, se completa dentro.

    public function getnombreCompleto(){
      return $this->first_name . " " . $this->last_name;
    }

    public function peliculas(){
      return $this->belongsToMany("App\Pelicula", "actor_movie", "actor_id", "movie_id");
                                                                                            //Relacion N:M : al igual que en la relacion 1:N, en primer lugar se declara que tipo de objeto va a devolver.
                                                                                            //En segundo lugar le nombre de la tabla intermedia.
                                                                                            //En tercer y cuarto lugar las claves foraneas de las tablas. Pero siempre primero la del modelo en donde estamos parados
                                                                                            //En este caso, como estamos en "Actor.php", se coloca en primer lugar "actor_id", y en segundo lugar la relacion que estamos tratando de definir.

    }

}
