<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelicula;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function shuffleUltimas(){

      $shuffle = Pelicula::all();
      $shuffle = $shuffle->shuffle();
      $peliculas = $shuffle->take(5);

      $vac = compact("peliculas");

      $ultimas = Pelicula::where("rating", ">=", 0)
      ->orderBy("id", "desc")
      ->get();

      $ultimas = $ultimas->take(5);

      $vac = compact("peliculas", "ultimas");
      return view('home', $vac);
    }


}
