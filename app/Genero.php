<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
  public $table = "genres";     //Esto aclara el nombre de la tabla de la base de datos que se va a usar.
//public $primaryKey = "id";   //Esto aclara el nombre de la clave primaria como "id". Si ya es "id", la linea es inutil.
//public $timestamps = false; //Esto aclara que no hay timestamps (created_at, updated_at) Si los hay, la linea es inutil.
  public $guarded = [];      //Esto aclara que la tabla puede manipularse por completo. En caso de querer que una parte no se pueda alterar, se completa dentro.

  public function peliculas(){
    return $this->hasMany("App\Pelicula", "genre_id"); //Se crea la relacion. En el primer lugar se declara que tipo de objeto va a devolver,
                                                      //en el segundo el nombre de la clave foranea que relaciona a ambos campos. 
  }

}
