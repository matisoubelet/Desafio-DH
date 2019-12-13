<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actor;

class actoresController extends Controller
{
    public function listado() {
      $actores = Actor::paginate(6);

      $vac = compact("actores");
      return view("listadoActores", $vac);
    }
}
