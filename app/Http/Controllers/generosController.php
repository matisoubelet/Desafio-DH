<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genero;

class generosController extends Controller
{
  public function listado() {
    $generos = Genero::paginate(6);

    $vac = compact("generos");
    return view("listadoGeneros", $vac);
  }
}
